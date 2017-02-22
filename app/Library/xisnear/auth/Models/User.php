<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Auth\Models;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 

/**
 * model
 * 
 * @author xisnear <service@xisnear.com>
 */
class User extends  Eloquent  
{
    protected $table = 'x_users';
}