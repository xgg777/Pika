<?php

namespace App\Repositories;

use App\Models\Menu;

/**
 * Comment Repository.
 */
class MenuRepository extends CommonRepository
{

    /**
     * 获取所有显示菜单
     *
     * @return array
     */
    public function getAllDisplayMenus()
    {
        $menus = [];

        if (empty($menus)) {
            $menus = $this->model->whereHide(0)->orderBy('sort', 'asc')->get()->toArray();
        }

        return $menus;
    }

}
