<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Rule\Fact;

/**
 * Rule Fact
 * 
 * @author pvol <pvol@163.com>
 */
class StringFact extends BaseFact{
    
    /**
     * check if the instance of this class equal to expect json object
     * 
     * @param json $expect
     */
    public function equalTo($expect){
        return $this->fact === $expect ? true : false;
    }
    
    /**
     * check if the instance of this class not equal to expect json object
     * 
     * @param json $expect
     */
    public function notEqualTo($expect){
        return $this->fact !== $expect ? true : false;
    }
    
    /**
     * check if the instance of this class less than expect json object
     * 
     * @param json $expect
     */
    public function lessThan($expect){
        return $this->fact < $expect ? true : false;
    }
    
    /**
     * check if the instance of this class equal or less than expect json object
     * 
     * @param json $expect
     */
    public function equalAndLessThan($expect){
        return $this->fact <= $expect ? true : false;
    }
    
    /**
     * check if the instance of this class greater than expect json object
     * 
     * @param json $expect
     */
    public function greaterThan($expect){
        return $this->fact > $expect ? true : false;
    }
    
    /**
     * check if the instance of this class equal or greater than expect json object
     * 
     * @param json $expect
     */
    public function equalAndGreaterThan($expect){
        return $this->fact >= $expect ? true : false;
    }
    
    /**
     * check if the instance of this class contains expect json object
     * 
     * @param json $expect
     */
    public function contain($expect){
        return strpos($this->fact, $expect) !== false  ? true : false;
    }
    
    /**
     * check if the instance of this class not contains expect json object
     * 
     * @param json $expect
     */
    public function notContain($expect){
        return strpos($this->fact, $expect) === false  ? true : false;
    }
    
    /**
     * check if the instance of this class like expect json object
     * 
     * @param json $expect
     */
    public function like($expect){
        if(preg_match($expect, $this->fact)){
            return true;
        }
        return false;
    }
    
    /**
     * check if the instance of this class not like expect json object
     * 
     * @param json $expect
     */
    public function notLike($expect){
        if(!preg_match($expect, $this->fact)){
            return true;
        }
        return false;
    }
    
}
