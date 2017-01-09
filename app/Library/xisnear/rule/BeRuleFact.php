<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Rule;

/**
 * Be Rule Fact
 * 
 * @author pvol <pvol@163.com>
 */
interface BeRuleFact {
    
    /**
     * check if the instance of this class equal to expect json object
     * 
     * @param json $expect
     */
    public function equalTo($expect); 
    
    /**
     * check if the instance of this class less than expect json object
     * 
     * @param json $expect
     */
    public function lessThan($expect); 
    
    /**
     * check if the instance of this class greater than expect json object
     * 
     * @param json $expect
     */
    public function greaterThan($expect); 
    
    /**
     * check if the instance of this class contains expect json object
     * 
     * @param json $expect
     */
    public function contain($expect); 
    
    /**
     * check if the instance of this class like expect json object
     * 
     * @param json $expect
     */
    public function like($expect); 
    
}
