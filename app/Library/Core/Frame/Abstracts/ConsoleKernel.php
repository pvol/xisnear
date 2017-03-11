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
abstract class ConsoleKernel
{
    protected $commands;
    
    /**
     * get commands
     */
    public function getCommands(){
        return $this->commands;
    }
}