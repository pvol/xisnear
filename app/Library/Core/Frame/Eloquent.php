<?php

/**
 * core
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * 
 */

namespace Core\Frame;

use Illuminate\Database\Capsule\Manager as DB;
use Core\Frame\Traits\Factory;

/**
 * class
 * 
 * 
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
