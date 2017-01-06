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
class View{
    
    use Factory;
    
    /**
     * route to view
     */
    public function render($tpl, $data = []){
        
        header("Content-type:text/html;charset=utf-8");
        
        require _base_path() . '/resources/views/' . $tpl . '.php';
    }
}