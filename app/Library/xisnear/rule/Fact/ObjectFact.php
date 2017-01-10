<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Rule\Fact;

use Xisnear\Rule\Exception\RuleException;

/**
 * Rule Fact
 * 
 * @author pvol <pvol@163.com>
 */
class ObjectFact extends BaseFact{
    
    /**
     * check if the instance of this class equal to expect json object
     * 
     * @param json $expect
     */
    public function equalTo($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] !== $expect_ary[$attribute]){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class not equal to expect json object
     * 
     * @param json $expect
     */
    public function notEqualTo($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] !== $expect_ary[$attribute]){
                return true;
            }
        }
        return false;
    }
    
    /**
     * check if the instance of this class less than expect json object
     * 
     * @param json $expect
     */
    public function lessThan($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] >= $expect_ary[$attribute]){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class equal or less than expect json object
     * 
     * @param json $expect
     */
    public function equalAndLessThan($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] > $expect_ary[$attribute]){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class greater than expect json object
     * 
     * @param json $expect
     */
    public function greaterThan($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] <= $expect_ary[$attribute]){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class equal or greater than expect json object
     * 
     * @param json $expect
     */
    public function equalAndGreaterThan($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if($fact[$attribute] < $expect_ary[$attribute]){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class contains expect json object
     * 
     * @param json $expect
     */
    public function contain($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if(strpos($fact[$attribute], $expect_ary[$attribute]) === false){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class not contains expect json object
     * 
     * @param json $expect
     */
    public function notContain($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if(strpos($fact[$attribute], $expect_ary[$attribute]) === false){
                return true;
            }
        }
        return false;
    }
    
    /**
     * check if the instance of this class like expect json object
     * 
     * @param json $expect
     */
    public function like($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if(!preg_match($expect_ary[$attribute], $fact[$attribute])){
                return false;
            }
        }
        return true;
    }
    
    /**
     * check if the instance of this class not like expect json object
     * 
     * @param json $expect
     */
    public function notLike($expect){
        $expect_ary = json_decode($expect, true);
        $fact = (array)$this->fact;
        foreach($expect_ary as $attribute){
            if(!isset($fact[$attribute])){
                throw new RuleException("rule expect error:no attribute " . $attribute);
            }
            if(!preg_match($expect_ary[$attribute], $fact[$attribute])){
                return true;
            }
        }
        return false;
    }
    
}
