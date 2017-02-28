<?php

namespace App\Http\Controllers\Admin;

use App\Facades\RoleRepository;
use Illuminate\Http\Request;
use App\Facades\UserRepository;
use App\Http\Controllers\Controller;
use Auth;
class UserController extends Controller
{

    public function index()
    {
        //默认不显示超级管理员
        $data = UserRepository::paginateWhere(['is_super_admin' => 0],config('repository.page-limit'));
        //获取角色列表
        $role_list = RoleRepository::lists('display_name', 'id');
        return view('admin.user.list', compact('data', 'role_list'));
    }

    public function create()
    {
        //获取角色列表
        $role_list = RoleRepository::lists('display_name', 'id');
        return view('admin.user.create', compact('role_list'));
    }

    /**
     *
     * 创建
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (!$request->has('roles') || empty($request->get('roles')))
        {
            return responseFail('res.user.no_roles');
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        $user =  UserRepository::create($data);

        $user->roles()->attach($request->get('roles'));

        return responseSuccess('', route('user.index'));
    }

    /**
     *
     * 编辑
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = UserRepository::find($id);
        $role_list = RoleRepository::lists('display_name', 'id');

        return view('admin.user.edit', compact('user', 'role_list'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('roles') || empty($request->get('roles')))
        {
            return responseFail('res.user.no_roles');
        }

        $data = $request->all();
        if ($request->has('password'))
        {
            $data['password'] = bcrypt($request->get('password'));
        }


        UserRepository::updateById($id, $data);
        $user = UserRepository::find($id);

        //清除原有关联关系
        $user->roles()->sync([]);

        foreach ($request->get('roles') as $role_id)
        {
            $user->attachRole(['id' => $role_id]);
        }

        return responseSuccess('', route('user.index'));
    }

    public function destroy($id)
    {
        UserRepository::destroy($id);

        return responseSuccess();
    }

    /**
     * 视图：修改个人资料
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPersonal()
    {
        return view('admin.user.personalEdit');
    }

    public function postPersonal(Request $request)
    {
        UserRepository::updateById(Auth::user()->id, $request->all());

        return responseSuccess('res.user.edit_user_success');
    }

}
