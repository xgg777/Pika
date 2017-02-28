<?php

return [
    'tag' => [
        'store' => [
            'title' => [
                'name' => '名称',
                'rules' => 'required',
                'message' => []
            ],
            'mark' => [
                'name' => '标签',
                'rules' => 'required',
                'message' => []
            ],

        ]
    ],
    'article' => [
        'store' => [
            'title' => [
                'name' => '标题',
                'rules' => 'required',
                'message' => []
            ],
            'author' => [
                'name' => '作者名称',
                'rules' => 'required',
                'message' => []
            ],
            'is_recommend' => [
                'name' => '是否推荐',
                'rules' => 'required',
                'message' => ['required' => '请选择是否推荐']
            ],
            'type' => [
                'name' => '文章类型',
                'rules' => 'required',
                'message' => ['required' => '请选择文章类型']
            ],
            'tags' => [
                'name' => '标签',
                'rules' => 'required',
                'message' => ['required' => '请选择标签']
            ],
            'content' => [
                'name' => '内容',
                'rules' => 'required',
                'message' => ['required' => '请填写文章内容']
            ],

        ]
    ],
    'menu' => [
        'store' => [
            'name' => [
                'name' => '菜单名称',
                'rules' => 'required|unique:menus',
                'message' => []
            ],
            'route' => [
                'name' => '菜单路由',
                'rules' => 'required',
                'message' => []
            ],
            'hide' => [
                'name' => '是否隐藏',
                'rules' => 'required',
                'message' => ['required' => '请选择 是否隐藏']
            ],
        ]
    ],
    'role' => [
        'store' => [
            'name' => [
                'name' => '角色名称',
                'rules' => 'required|unique:roles',
                'message' => []
            ],
            'display_name' => [
                'name' => '标签',
                'rules' => 'required',
                'message' => []
            ],
            'permissions' => [
                'name' => '权限',
                'rules' => 'required',
                'message' => ['required' => '请选择 权限']
            ],
        ],
        'update' => [
            'name' => [
                'name' => '角色名称',
                'rules' => 'required',
                'message' => []
            ],
            'display_name' => [
                'name' => '标签',
                'rules' => 'required',
                'message' => []
            ],
        ],
    ],

];