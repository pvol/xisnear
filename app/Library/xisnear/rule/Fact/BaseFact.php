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
    
    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }
    
}
