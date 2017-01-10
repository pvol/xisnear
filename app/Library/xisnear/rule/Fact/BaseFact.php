<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Rule\Fact;

use Xisnear\Frame\Traits\Factory;

/**
 * Rule Fact
 * 
 * @author xisnear <service@xisnear.com>
 */
abstract class BaseFact {
    
    use Factory;
    
    /** @var the object or variable that will be compared with */
    protected $fact;
    
    public function setFact($fact){
        $this->fact = $fact;
    }
    
    /**
     * check if the instance of this class equal to expect json object
     * 
     * @param json $expect
     */
    abstract public function equalTo($expect);
    
    /**
     * check if the instance of this class not equal to expect json object
     * 
     * @param json $expect
     */
    abstract function notEqualTo($expect);
    
    /**
     * check if the instance of this class less than expect json object
     * 
     * @param json $expect
     */
    abstract function lessThan($expect);
    
    /**
     * check if the instance of this class equal or less than expect json object
     * 
     * @param json $expect
     */
    abstract public function equalAndLessThan($expect);
    
    /**
     * check if the instance of this class greater than expect json object
     * 
     * @param json $expect
     */
    abstract public function greaterThan($expect);
    
    /**
     * check if the instance of this class equal or greater than expect json object
     * 
     * @param json $expect
     */
    abstract public function equalAndGreaterThan($expect);
    
    /**
     * check if the instance of this class contains expect json object
     * 
     * @param json $expect
     */
    abstract public function contain($expect);
    
    /**
     * check if the instance of this class not contains expect json object
     * 
     * @param json $expect
     */
    abstract public function notContain($expect);
    
    /**
     * check if the instance of this class like expect json object
     * 
     * @param json $expect
     */
    abstract public function like($expect);
    
    /**
     * check if the instance of this class not like expect json object
     * 
     * @param json $expect
     */
    abstract public function notLike($expect);
    
}
