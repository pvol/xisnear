<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Rule\Traits;

/**
 * trait use rule
 * 
 * import this trait and run useRule function,
 * the object of model will auto added to fact instance.
 * 
 * @author xisnear <service@xisnear.com>
 */
trait UseRule{
    
    public static $rule_fact_obj;
    
    /**
     * used in the instance of model
     */
    public function useRule(){
        static::$rule_fact_obj = $this;
    }
    
    /**
     * used in the fact class
     */
    public static function getFact() {
        return static::$rule_fact_obj;
    }

}