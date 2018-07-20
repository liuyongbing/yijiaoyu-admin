<?php
return [
    'taekwondo' => [
        'label' => '跆拳道',
        'route' => 'grades.index',
        'params' => [],
        'auth_routes' => ['grades', 'courses', 'teachings'],
        'children' => [
            /* 'law' => [
                'label' => '法律法规',
                'route' => 'documents.law.index',
                'params' => [],
            ],
            'news' => [
                'label' => '新闻',
                'route' => 'documents.news.index',
                'params' => [],
            ] */
        ]
    ],
    'members' => [
        'label' => '人物品牌',
        'route' => 'members.index',
        'params' => [],
        'auth_routes' => ['members'],
    ],
    'banner' => [
        'label' => 'Banner',
        'route' => 'banner.index',
        'params' => [],
        'auth_routes' => ['banner'],
    ],
    'news' => [
        'label' => '资讯',
        'route' => 'news.index',
        'params' => [],
        'auth_routes' => ['news'],
    ],
    'categories' => [
        'label' => '分类',
        'route' => 'categories.index',
        'params' => [],
        'auth_routes' => ['categories'],
    ],
    'accounts' => [
        'label' => '后台帐号管理',
        'route' => 'accounts.index',
        'params' => [],
        'auth_routes' => ['accounts'],
    ],
];