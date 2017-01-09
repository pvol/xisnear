<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * @author pvol <pvol@163.com>
 */

namespace Xisnear\Frame;

use Xisnear\Frame\Traits\Factory;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * class
 * 
 * @author pvol <pvol@163.com>
 */
class Log {

    use Factory;
    
    public $logger;

    /**
     * init log
     */
    public function init($name = 'system') {
        $this->logger = new Logger($name);
        
        $this->file_path = _storage_path() . '/logs/' . date("Y-m-d") . '/' . $name . '_' . date("Y-m-d") . '.log';
        
        $this->logger->pushHandler(new StreamHandler($this->file_path));
    }
}
