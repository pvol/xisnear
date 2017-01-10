<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Modules\Rules;

use Xisnear\Rule\Fact\ObjectFact;

/**
 * user role fact
 * 
 * @author xisnear <service@xisnear.com>
 */
class User extends ObjectFact
{
    public function __construct() {
        $this->setFact(\App\Models\User::getFact());
    }
}