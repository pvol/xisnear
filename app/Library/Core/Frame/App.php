<?php

/**
 * core
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * 
 */

namespace Core\Frame;

use Core\Frame\Traits\Factory;

/**
 * class App
 * 
 * 
 */
class App{
    
    use Factory;
    
    public $route;
    
    public $view;
    
    public function __construct() {
        $this->route = Route::singleton();
        $this->view = View::singleton();
    }
    
    public function run(){
        if(!$this->route->dispatch(Route::DISPATCH_BY_ROUTE_CONFIG)){
            _view('404');
        }    
    }
    
    public function exec(){
        if(!$this->route->dispatch(Route::DISPATCH_BY_COMMON_PRACTICE)){
            _view('404');
        }    
    }
}