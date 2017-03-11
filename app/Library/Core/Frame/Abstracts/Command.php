<?php

/**
 * core
 * 
 * @version 1.0
 * @package Frame
 * 
 */

namespace Core\Frame\Abstracts;

/**
 * interface command
 * 
 * 
 */
abstract class Command
{
    /** @var console arguments */
    public $argv;
    
    public abstract function handle();
}