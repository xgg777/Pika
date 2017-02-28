<?php
namespace App\Http\Controllers\Admin;

use App\Facades\ActionRepository;
use App\Facades\MenuRepository;
use App\Facades\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class PermissionController extends Controller
{

    
    public function index()
    {
        $data = PermissionRepository::paginate(config('repository.page-limit'));

        return view('admin.permission.list', compact('data'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        PermissionRepository::create($request->all());
        return responseSuccess('', route('permission.index'));
    }

    public function edit($id)
    {
        $permission = PermissionRepository::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        PermissionRepository::updateById( $id, $request->all());

        return responseSuccess('', route('permission.index'));
    }

    public function destroy($id)
    {
        PermissionRepository::destroy($id);

        return responseSuccess();
    }

    public function related($id)
    {
        $permission = PermissionRepository::find($id);

        $has_active = [];

        switch ($permission->type) {
            case 'menu':
                $has_active = $permission->menus()->lists('id')->toArray();
                $menus = PermissionRepository::renderPermissionMenuSidebar(create_node_tree(MenuRepository::all()), $has_active);
                break;
            case 'action':
                $data = ActionRepository::getAllActionMenuByGroup();
                $has_active = $permission->actions()->lists('id')->toArray();
                $menus = PermissionRepository::renderPermissionActionSidebar($data, $has_active);
                break;
        }

        return view('admin.permission.' . $permission->type, compact('has_active', 'id', 'menus'));
    }

    public function relatedMenu(Request $request)
    {
        $permission = PermissionRepository::find($request->get('permission_id'));

        $permission->menus()->sync([]);

        $permission->menus()->attach($request->get('menus'));

        return responseSuccess('', route('permission.index'));
    }

    public function relatedAction(Request $request)
    {
        $permission = PermissionRepository::find($request->get('permission_id'));

        $permission->actions()->sync([]);

        $permission->actions()->attach($request->get('menus'));

        return responseSuccess('', route('permission.index'));
    }
}
