<?php

/**
 * core
 * 
 * @version 1.0
 * @package App\Traits
 * @ignore
 * 
 */

namespace Core\Frame\Traits;

/**
 * trait factory
 * 
 * 
 */
trait Factory{
    
    public static $obj;
    
    public static function singleton(){
        if (!self::$obj) {
            return self::$obj = new static();
        }
        return self::$obj;
    }
    
    public static function factory() {
        return new static();
    }

}