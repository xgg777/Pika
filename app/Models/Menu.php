<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'icon',
        'name',
        'route',
        'description',
        'sort',
        'hide',
    ];

    const MENU_HIDE_NO = 0;

    const MENU_HIDE_YES = 1;

    public static $MENU_HIDE = [
        self::MENU_HIDE_NO  => '显示',
        self::MENU_HIDE_YES => '隐藏'
    ];

    public function cMenus()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id');
    }
}