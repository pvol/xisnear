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
 * class
 * 
 * 
 */
class View{
    
    use Factory;
    
    /**
     * route to view
     */
    public function render($tpl, $data = []){
        
        header("Content-type:text/html;charset=utf-8");
        
        require _base_path() . '/resources/views/' . $tpl . '.phtml';
    }
}