<?php

/**
 * core
 * 
 * @version 1.0
 * @package Frame
 * 
 */

namespace Core\Flow\Dispatcher;

/**
 * interface command
 * 
 * 
 */
abstract class Dispatcher
{
    public abstract function handle($flow_id, $ext);
}