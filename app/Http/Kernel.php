<?php

/**
 * App
 * 
 * @version 1.0
 * @package App
 * @ignore
 */

namespace App\Http;

/**
 * class for config kernel
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
