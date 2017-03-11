<?php

/**
 * core
 * 
 * @version 1.0
 * @package Rule
 * 
 */

namespace Core\Rule\Fact;

use Core\Rule\Exception\RuleException;

/**
 * Rule Fact
 * 
 * 
 */
class RoleFact extends BaseFact{
    
    /**
     * check if the instance of this class equal to expect json object
     * 
     * @param json $expect
     */
    public function equalTo($expect){
        return true;
    }
}
