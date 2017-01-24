<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Flow\Abstracts;

/**
 * interface command
 * 
 * @author xisnear <service@xisnear.com>
 */
abstract class Dispatcher
{
    public abstract function handle($flow_id, $ext);
}