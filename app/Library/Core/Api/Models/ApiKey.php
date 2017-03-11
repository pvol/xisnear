<?php 

/**
 * core
 * 
 * @version 1.0
 * @package Api
 * 
 */

namespace Core\Api\Models;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 

/**
 * ApiKey
 */
class ApiKey extends Eloquent
{
    protected $table = 'x_api_keys';
}
