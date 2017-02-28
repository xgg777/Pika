<?php

namespace App\Repositories;

use App\Facades\ActionRepository;
use App\Facades\MenuRepository as Menu;
use App\Models\Action;
use App\Models\Menu as MenuModel;
/**
 * Role Repository.
 */
class PermissionRepository extends CommonRepository
{


    public function renderPermissionMenuSidebar(array $menus, $active)
    {
        $sidebar = "";

        foreach ($menus as $menu) {
            if (isset($menu['_child']) && !empty($menu['_child'])) {
                $sidebar .= '<li class="treeview active">';
                if (in_array($menu['id'], $active))
                {
                    $sidebar .= '<label><input type="checkbox" name="menus[]" value="'.$menu['id'].'" checked />'.$menu['name'].'</label>';
                } else {
                    $sidebar .= '<label><input type="checkbox" name="menus[]" value="'.$menu['id'].'" />'.$menu['name'].'</label>';
                }
                $sidebar .=    '<ul class="treeview-menu">' .
                    $this->renderPermissionMenuSidebar($menu['_child'], $active) .
                    '</ul>
                    </li>';
            } else {
                $sidebar .= '<li class="active">';
                if (in_array($menu['id'], $active))
                {
                    $sidebar .= '<label><input type="checkbox" name="menus[]" value="'.$menu['id'].'" checked />'.$menu['name'].'</label>';
                } else {
                    $sidebar .= '<label><input type="checkbox" name="menus[]" value="'.$menu['id'].'" />'.$menu['name'].'</label>';
                }
                $sidebar .= '</li>';
            }
        }

        return $sidebar;
    }

    public function renderPermissionActionSidebar(array $menus, $active)
    {
        $sidebar = "";

        foreach ($menus as $group => $menu)
        {
            $sidebar .= '<li class="treeview active">';
            $sidebar .= '<label><input type="checkbox" />'.$group.'</label>';
            $sidebar .=    '<ul class="treeview-menu">';

            foreach ($menu as $key => $value)
            {
                $sidebar .= '<li class="active">';
                if (in_array($value['id'], $active))
                {
                    $sidebar .= '<label><input type="checkbox" name="actions[]" value="'.$value['id'].'" checked />'.$value['name'].'</label>';
                } else {
                    $sidebar .= '<label><input type="checkbox" name="actions[]" value="'.$value['id'].'" />'.$value['name'].'</label>';
                }
                $sidebar .= '</li>';
            }
            $sidebar .= '</ul></li>';
        }

        return $sidebar;
    }

    /**
     * 根据权限模型获取菜单关联树
     *
     * @param $permission
     *
     * @return array
     */
    public function getAllMenusTreeByPermissionModel($permission)
    {
        $data = [];
        $menus = Menu::getAllMenusLists();
        $permissions = $permission->menus()->lists('id')->toArray();

        foreach ($menus as $key => $menu) {
            $data[$key]['id'] = $menu['id'];
            $data[$key]['pId'] = $menu['parent_id'];
            $data[$key]['name'] = $menu['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($menu['id'], $permissions)) {
                $data[$key]['checked'] = true;
            }
        }

        return $data;
    }

    /**
     * 根据权限模型获取操作关联树
     *
     * @param $permission
     *
     * @return array
     */
    public function getAllActionsByPermissionModel($permission)
    {
        $data = [];
        $actions = ActionRepository::all()->toArray();
        $permissions = $permission->actions()->lists('id')->toArray();

        foreach ($actions as $key => $action) {
            $data[$key]['id'] = $action['id'];
            $data[$key]['pId'] = $action['group'];
            $data[$key]['name'] = $action['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($action['id'], $permissions)) {
                $data[$key]['checked'] = true;
            }
        }

        foreach (config('cowcat.action-group') as $key => $value) {
            $group['id'] = $key;
            $group['pId'] = 0;
            $group['name'] = $value;
            $group['open'] = true;
            $group['value'] = 1;
            array_push($data, $group);
        }

        return $data;
    }
}
