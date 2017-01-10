<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author pvol <pvol@163.com>
 */

namespace App\Models;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 
use Xisnear\Rule\Traits\UseRule;

/**
 * class test controller
 * 
 * @author pvol <pvol@163.com>
 */
class User extends  Eloquent  
{
    use UseRule;
    
    protected $table = 'test';
}