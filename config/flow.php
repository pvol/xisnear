<?php

return [
    'apply'=>[
            'title' => 'start',
            'action' => [ 
                'Xisnear\Flow\Action@create',
                'Xisnear\Flow\Action@storage', 
                'Xisnear\Flow\Action@publish', 
            ],
            'roles' => [
                'channel'
            ],
            'condition'=>[
            ],
            'createto'=>'next',
            'run_type'=>'',
        ], 
    'next'=>[
            'title' => 'end',
            'action' => [
                'Xisnear\Flow\Action@next',
            ],
            'roles' => [
                'channel'
            ],
            'condition'=>[
            ],
            'run_type'=>'',
        ],
];
