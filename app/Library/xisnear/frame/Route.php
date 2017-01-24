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
use Xisnear\Frame\Exception\FrameException;

/**
 * class
 * 
 * @author xisnear <service@xisnear.com>
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
    
    /** @var middleware instance */
    public $middleware;
    
    /** @var middlewares that will be used in route */
    public $middlewares = [];
    
    /** @var request method get */
    const METHOD_GET = 'GET';
    
    /** @var request method post */
    const METHOD_POST = 'POST';
    
    /** @var dispatch by route config */
    const DISPATCH_BY_ROUTE_CONFIG = 1;
    
    /** @var dispatch by common practice */
    const DISPATCH_BY_COMMON_PRACTICE = 2;
    
    public function __construct() {
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $this->uniq = filter_input(INPUT_SERVER, 'UNIQUE_ID');
        $this->method = ucwords(filter_input(INPUT_SERVER, 'REQUEST_METHOD'));
        $this->middleware = new Middleware();
    }
    
    /**
     * dispatch to controller
     */
    protected function dispatch($type = self::DISPATCH_BY_ROUTE_CONFIG){
        switch($type){
            case self::DISPATCH_BY_ROUTE_CONFIG:
                return $this->dispatchByRouteConfig();
                break;
            case self::DISPATCH_BY_COMMON_PRACTICE:
                return $this->dispatchByCommonPractice();
                break;
            default:
                break;
        }
    }
    
    /**
     * dispatch to controller by route config 
     */
    protected function dispatchByRouteConfig(){
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
     * dispatch to controller by common practice
     */
    protected function dispatchByCommonPractice(){
        global $argv;
        $this->uri = $argv[1];
        $this->uniq = uniqid();
        $kernel = new \App\Console\Kernel();
        $commands = $kernel->getCommands();
        // check if command in kernel
        if(!array_key_exists($this->uri, $commands)){
            throw new FrameException("Command not support, please config the command in Console\Kernel.php.");
        }
        // check if extends from base command
        if(!is_subclass_of($commands[$this->uri], Abstracts\Command::class)){
            throw new FrameException("Command not support, command must be subclass of Xisnear\Frame\Abstracts\Command.");
        }
        $command_obj = new $commands[$this->uri]();
        $command_obj->handle();
        return true;
    }
    
    /**
     * add new route
     */
    protected function addRoute($method, $alias, $path){
        $paths = explode('@', $path);
        if($method === 'any'){
            $this->queue[self::METHOD_GET][$alias] = ["path" => $paths, 'middleware' => $this->middlewares];
            $this->queue[self::METHOD_POST][$alias] = ["path" => $paths, 'middleware' => $this->middlewares];
        } else {
            $this->queue[$method][$alias] = ["path" => $paths, 'middleware' => $this->middlewares];
        }
    }
    
    /**
     * add route group
     */
    protected function group($config, $callback){
        if(isset($config['middleware'])){
            $this->middlewares = $config['middleware'];
            $callback($this);
            $this->middlewares = []; // clear
        }
    }
    
    /**
     * routes function, add get method route rule
     */
    protected function get($alias, $path){
        $this->addRoute(self::METHOD_GET, $alias, $path);
    }
    
    /**
     * routes function, add post method route rule
     */
    protected function post($alias, $path){
        $this->addRoute(self::METHOD_POST, $alias, $path);
    }
    
    /**
     * routes function, add both get and post method route rule
     */
    protected function any($alias, $path){
        $this->addRoute('any', $alias, $path);
    }
    
    /**
     * routes function, add function start with get and post to route rule
     */
    protected function controller($alias, $path){
        $class_methods = get_class_methods($path);
        foreach($class_methods as $class_method){
            if(\App\Library\Str::startsWith($class_method, strtolower(self::METHOD_GET))){
                $this->addRoute(
                        self::METHOD_GET, 
                        $alias . '/' . strtolower(substr($class_method, strlen(self::METHOD_GET))), 
                        $path . '@' . $class_method
                );
            }
            if(\App\Library\Str::startsWith($class_method, strtolower(self::METHOD_POST))){
                $this->addRoute(
                        self::METHOD_POST, 
                        $alias . '/' . strtolower(substr($class_method, strlen(self::METHOD_POST))), 
                        $path . '@' . $class_method
                );
            }
        }
    }
    
    /**
     * use group、get etc. as static function
     */
    public static function __callStatic($method, $parameters) {
        if(!in_array($method, ['dispatch', 'group', 'get', 'post', 'any', 'controller'])){
            throw new FrameException("Class Route static function $method not found.");
        }
        $instance = static::singleton();
        return call_user_func_array([$instance, $method], $parameters);
    }
    
    /**
     * use group、get etc. as instance function
     */
    public function __call($method, $parameters) {
        if(!in_array($method, ['dispatch', 'group', 'get', 'post', 'any', 'controller'])){
            throw new FrameException("Class Route instance function $method not found.");
        }
        return call_user_func_array([$this, $method], $parameters);
    }
    
}