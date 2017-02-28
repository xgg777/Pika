<?php
namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'type'
    ];

    const PERMISSION_TYPE_MENU = 'menu';

    const PERMISSION_TYPE_ACTION = 'action';

    public static $PERMISSION_TYPES = [
        self::PERMISSION_TYPE_MENU      => '菜单',
        self::PERMISSION_TYPE_ACTION    => '操作'
    ];

    public function actions()
    {
        return $this->belongsToMany('App\Models\Action');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }
}