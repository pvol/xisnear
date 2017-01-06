<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Traits
 * @ignore
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Frame\Traits;

/**
 * trait factory
 * 
 * @author pvol <pvol@163.com>
 */
trait Factory{
    
    public static $obj;
    
    public static function singleton(){
        if(!self::$obj){
            return self::$obj = new static();
        }
        return self::$obj;
    }
    
    public static function factory(){
        return new static();
    }
}