<?php

return [
    'groups' => [
        'group1' => [
            'rule1', 'rule2', 'rule3'
        ],
    ],
    'rules' => [
        'rule1' => ['fact' => 'User', 'compare' => '=', 'expect' => '{name:"test"}'],
        'rule2' => ['fact' => 'User', 'compare' => '>', 'expect' => '{age:"20"}'],
        'rule3' => ['fact' => 'User', 'compare' => '<', 'expect' => '{contry:"中国"}'],
    ]
];
