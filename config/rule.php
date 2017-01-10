<?php

return [
    'groups' => [
        'group1' => [
            'rule1', 'rule2', 'rule3'
        ],
    ],
    'fact' => [
        'user' => 'App\Modules\Rules\User',
    ],
    'rules' => [
        'rule1' => ['fact' => 'user', 'compare' => '=', 'expect' => '{name:"test"}'],
        'rule2' => ['fact' => 'user', 'compare' => '>', 'expect' => '{age:"20"}'],
        'rule3' => ['fact' => 'user', 'compare' => '<', 'expect' => '{contry:"中国"}'],
    ]
];
