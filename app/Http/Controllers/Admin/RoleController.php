<?php

namespace App\Http\Controllers\Admin;

use App\Facades\PermissionRepository;
use App\Facades\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\Traits\ValidationTrait;
class RoleController extends Controller
{

    use ValidationTrait;
    public function index()
    {
        $data = RoleRepository::paginate(config('repository.page-limit'));
        return view('admin.role.list', compact('data'));
    }

    /**
     *
     * 创建
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = PermissionRepository::lists('display_name', 'id');

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'role.store');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $role =  RoleRepository::create($request->all());

        $role->perms()->sync($request->get('permissions'));

        return responseSuccess('','', route('role.index'));
    }

    /**
     *
     * 视图：编辑
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = RoleRepository::find($id);

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     *
     * 动作：编辑
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'role.update');
        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        RoleRepository::updateById($id, $request->all());

        return responseSuccess('','', route('role.index'));
    }

    /**
     *
     * 编辑权限
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPermission($id)
    {
        $role = RoleRepository::find($id);

        $permissions = PermissionRepository::lists('display_name', 'id');

        return view('admin.role.edit-permission', compact('role', 'permissions'));
    }

    /**
     *
     * 编辑权限：动作
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePermission(Request $request, $id)
    {
        $role = RoleRepository::find($id);

        //清除原有关联关系
        $role->perms()->sync([]);

        $role->perms()->attach($request->get('permissions'));

        return responseSuccess('', route('role.index'));
    }

    public function destroy($id)
    {
        RoleRepository::destroy($id);

        return responseSuccess();
    }

}
