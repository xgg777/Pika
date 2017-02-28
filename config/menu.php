<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 9:18
 */

return [
    'article' => [
        'title' => '文章管理',
        'class' => 'fa fa-link',
        'icon' => '',
        'url' => '',
        'permission' =>'article_show',//所需权限
        'c_menu' => [
            [
                'title' => '文章列表',
                'class' => '',
                'icon' => 'fa fa-arrows-v',
                'url' => '/article/list',
                'permission' =>'article_show',//所需权限
            ],
            [
                'title' => '文章添加byUEditor',
                'class' => '',
                'icon' => 'fa fa-plus',
                'url' => '/article/create',
                'permission' =>'article_create_byueditor',
            ],
            [
                'title' => '文章添加byMarkdown',
                'class' => '',
                'icon' => 'fa fa-plus',
                'url' => '/article/markdown',
                'permission' =>'article_create_bymarkdown',
            ]
        ],

    ],
    'tag' => [
        'title' => '标签管理',
        'class' => 'fa fa-link',
        'icon' => '',
        'url' => '',
        'permission' =>'article_show',//所需权限
        'c_menu' => [
            [
                'title' => '标签列表',
                'class' => '',
                'icon' => 'fa fa-tags',
                'url' => '/tag/list',
                'permission' =>'article_show',//所需权限
            ],
            [
                'title' => '标签添加',
                'class' => '',
                'icon' => 'fa fa-plus',
                'url' => '/tag/create',
                'permission' =>'article_show',
            ],
        ],

    ],
    'comment' => [
        'title' => '评论管理',
        'class' => 'fa fa-link',
        'icon' => '',
        'url' => '',
        'permission' =>'comment_show',//所需权限
        'c_menu' => [
            [
                'title' => '评论列表',
                'class' => '',
                'icon' => 'fa fa-comment-o',
                'url' => '/comment/list',
                'permission' =>'comment_show',//所需权限
            ],
        ],

    ],
    'menu' => [
        'title' => '菜单管理',
        'class' => 'fa fa-link',
        'icon' => '',
        'url' => '',
        'permission' =>'account_show',//所需权限
        'c_menu' => [
            [
                'title' => '菜单列表',
                'class' => '',
                'icon' => 'fa fa-arrows-v',
                'url' => '/menu/list',
                'permission' =>'account_show',//所需权限
            ],
            [
                'title' => '菜单添加',
                'class' => '',
                'icon' => 'fa fa-plus',
                'url' => '/menu/create',
                'permission' =>'account_role_show',
            ],
        ],
    ],
    'account' => [
        'title' => '账户管理',
        'class' => 'fa fa-link',
        'icon' => '',
        'url' => '',
        'permission' =>'account_show',//所需权限
        'c_menu' => [
            [
                'title' => '账户管理',
                'class' => '',
                'icon' => 'fa fa-user-plus',
                'url' => '/user/list',
                'permission' =>'account_show',//所需权限
            ],
            [
                'title' => '角色管理',
                'class' => '',
                'icon' => 'fa fa-user-secret',
                'url' => '/role/list',
                'permission' =>'account_role_show',
            ],
            [
                'title' => '权限管理',
                'class' => '',
                'icon' => 'fa fa-ban',
                'url' => '/permission/list',
                'permission' =>'account_permission_show',
            ],
        ],
    ],
];