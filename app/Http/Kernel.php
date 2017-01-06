<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author pvol <pvol@163.com>
 */

namespace App\Http;

/**
 * class for config kernel
 * 
 * @author pvol <pvol@163.com>
 */
class Kernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    public $middleware = [
        
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    public $routeMiddleware = [
        'before_mid' => \App\Http\Middleware\BeforeMiddleware::class,
        'after_mid' => \App\Http\Middleware\AfterMiddleware::class,
    ];
}
