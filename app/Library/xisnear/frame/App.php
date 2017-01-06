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
 * class App
 * 
 * @author pvol <pvol@163.com>
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