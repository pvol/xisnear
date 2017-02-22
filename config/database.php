<?php

return [
    "mysql" => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'xisnear',
        'username' => 'entsafe',
        'password' => 'entsafe',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
    "redis" => [
        "session" => ["conn" => 'tcp://127.0.0.1:6379', "db" => 1],
        "cache" => ["conn" => 'tcp://127.0.0.1:6379', "db" => 0],
    ]
];
