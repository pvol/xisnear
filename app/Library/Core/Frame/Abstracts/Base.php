<?php

/**
 * core
 * 
 * @version 1.0
 * @package Frame
 */

namespace Core\Frame\Abstracts;

/**
 * Base class
 */
abstract class Base
{
    /** @var 当前权限 */
    protected $auth;
    
    /** @var 当前用户 */
    protected $user_id;
    
    /** @var 当前时间 */
    protected $now;

    public function __construct(){
        $this->auth = \Core\Flow\Auth::singleton();
        $this->user_id = $this->auth->user()->id;
        $this->role_id = $this->auth->role()->role_id;
        $this->now = date("Y-m-d H:i:s");
    }
}