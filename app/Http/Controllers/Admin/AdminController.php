<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Menu;
use Route;
class AdminController extends BaseController
{
    public function index()
    {
        return view('admin.index');
    }

    public function test()
    {
        //return redirect('role/list');
        if (Route::has('role/list'))
        {
            dd(123);exit;
        }

        $menus = Menu::all()->toArray();

        $trees = create_node_tree($menus);
        dd($trees);
    }
}
