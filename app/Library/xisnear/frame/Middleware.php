<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Frame;

use Xisnear\Frame\Traits\Factory;

/**
 * class
 * 
 * @author xisnear <service@xisnear.com>
 */
class Middleware{
    
    use Factory;
    
    /** @var middlewares, prepare to route */
    public $middlewares;
    
    /**
     * add middleware
     */
    public function middleware(){
        $kernel = new \App\Http\Kernel;
        foreach($kernel->middleware as $middleware_name){
            $middleware = new $middleware_name();
            $middleware->handle();
        }
    }
    
    /**
     * add route middleware
     */
    public function routeMiddleware($middleware_name){
        $kernel = new \App\Http\Kernel;
        $middleware = new $kernel->routeMiddleware[$middleware_name]();
        $middleware->handle();
    }
    
}