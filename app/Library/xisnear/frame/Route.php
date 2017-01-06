<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Frame;

use Xisnear\Frame\Traits\Factory;

/**
 * class
 * 
 * @author pvol <pvol@163.com>
 */
class Route{
    
    use Factory;
    
    /** @var request uri */
    public $uri;
    
    /** @var request unique id */
    public $uniq;
    
    /** @var request method,post get */
    public $method;
    
    /** @var request queue */
    public $queue = [];
    
    /** @var request method get */
    const METHOD_GET = 'GET';
    
    /** @var request method post */
    const METHOD_POST = 'POST';
    
    public function __construct() {
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $this->uniq = filter_input(INPUT_SERVER, 'UNIQUE_ID');
        $this->method = ucwords(filter_input(INPUT_SERVER, 'REQUEST_METHOD'));
        $this->middleware = new Middleware();
    }
    
    /**
     * dispatch to controller action
     */
    public function dispatch(){
        foreach ($this->queue[$this->method] as $alias => $paths) {
            if (!\App\Library\Str::startsWith($this->uri, $alias)) {
                continue;
            }
            $this->middleware->middleware();
            foreach ($paths['middleware'] as $middleware_name) {
                if (!\App\Library\Str::startsWith($middleware_name, 'after')) {
                    $this->middleware->routeMiddleware($middleware_name);
                }
            }
            try {
                $obj = new $paths['path'][0]();
                $obj->{$paths['path'][1]}();
            } catch (\Exception $e) {
                $exception_handler = new \App\Exceptions\Handler();
                $exception_handler->report($e);
            }
            foreach ($paths['middleware'] as $middleware_name) {
                if (\App\Library\Str::startsWith($middleware_name, 'after')) {
                    $this->middleware->routeMiddleware($middleware_name);
                }
            }
            return true;
        }
    }

    /**
     * add new route
     */
    public function addRoute($method, $alias, $path){
        $paths = explode('@', $path);
        $middleware = Middleware::singleton()->middlewares;
        switch($method){
            case self::METHOD_GET:
                $this->queue[$method][$alias] = ["path" => $paths, 'middleware' => $middleware];
                break;
            case self::METHOD_POST:
                $this->queue[$method][$alias] = ["path" => $paths, 'middleware' => $middleware];
                break;
            default :
                $this->queue[self::METHOD_GET][$alias] = ["path" => $paths, 'middleware' => $middleware];
                $this->queue[self::METHOD_POST][$alias] = ["path" => $paths, 'middleware' => $middleware];
                break;
        } 
    }
    
    /**
     * add route group
     */
    public static function group($config, $callback){
        if(isset($config['middleware'])){
            Middleware::singleton()->middlewares = $config['middleware'];
            call_user_func($callback);
            Middleware::singleton()->middlewares = [];
        }
    }
    
    /**
     * routes function, add get method route rule
     */
    public static function get($alias, $path){
        Route::singleton()->addRoute(self::METHOD_GET, $alias, $path);
    }
    
    /**
     * routes function, add post method route rule
     */
    public static function post($alias, $path){
        Route::singleton()->addRoute(self::METHOD_POST, $alias, $path);
    }
    
    /**
     * routes function, add both get and post method route rule
     */
    public static function any($alias, $path){
        Route::singleton()->addRoute('any', $alias, $path);
    }
    
}