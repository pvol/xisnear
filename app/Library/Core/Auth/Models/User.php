<?php

/**
 * core
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * 
 */

namespace Core\Auth\Models;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 

/**
 * model
 * 
 * 
 */
class User extends  Eloquent  
{
    protected $table = 'x_auth_users';
}