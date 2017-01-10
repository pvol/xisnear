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
 * class App
 * 
 * @author xisnear <service@xisnear.com>
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
        if(!$this->route->dispatch()){
            abort();
        }    
    }
    
    public function exec(){
        // todo
    }
}