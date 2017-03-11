<?php

/**
 * core
 * 
 * @version 1.0
 * @package Rule
 * 
 */

namespace Core\Rule\Fact;

use Core\Frame\Traits\Factory;

/**
 * Rule Fact
 * 
 * 
 */
abstract class BaseFact {
    
    use Factory;
    
    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }
    
}
