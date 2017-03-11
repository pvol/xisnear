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
class RoleUser extends  Eloquent  
{
    protected $table = 'x_auth_user_roles';
}