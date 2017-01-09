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

use Illuminate\Database\Capsule\Manager as DB;
use Xisnear\Frame\Traits\Factory;

/**
 * class
 * 
 * @author pvol <pvol@163.com>
 */
class Eloquent {
    
    use Factory;

    public function init($config_path = 'database.mysql') {
        $database = _config($config_path);
        
        $db = new DB();

        $db->addConnection($database);

        $db->setAsGlobal();

        $db->bootEloquent();
    }

}
