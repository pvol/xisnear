<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Rule
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Rule\Fact;

use Xisnear\Rule\Exception\RuleException;

/**
 * Rule Fact
 * 
 * @author xisnear <service@xisnear.com>
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
