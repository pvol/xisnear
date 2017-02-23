<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Frame\Abstracts;

/**
 * Base class
 * 
 * @author xisnear <service@xisnear.com>
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
        $this->auth = \Xisnear\Flow\Auth::singleton();
        $this->user_id = $this->auth->user()->id;
        $this->now = date("Y-m-d H:i:s");
    }
}