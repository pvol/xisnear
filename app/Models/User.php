<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Models;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 
use Xisnear\Rule\Traits\UseRule;

/**
 * class test controller
 * 
 * @author xisnear <service@xisnear.com>
 */
class User extends  Eloquent  
{
    use UseRule;
    
    protected $table = 'test';
}