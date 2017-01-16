<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Xisnear\Frame
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Frame\Abstracts;

/**
 * interface command
 * 
 * @author xisnear <service@xisnear.com>
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