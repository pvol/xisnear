<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package Frame
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Frame;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Connectors\MySqlConnector;
use Illuminate\Database\Schema\Grammars\MySqlGrammar;
use Illuminate\Database\Connection;

/**
 * class
 * 
 * @author xisnear <service@xisnear.com>
 */
class Migration {
    
    protected $connection;
    
    protected $log = [];
    
    public function __construct() {
        if(empty($this->connection)){
            $this->connection = "mysql";
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function table($table, $callback) {
        
        $blueprint = new Blueprint($table);
        
        $conn = new MySqlConnector();
        
        $pdo = $conn->connect(_config('database.' . $this->connection));
        
        $connection = new Connection($pdo);
        
        $grammar = new MySqlGrammar();
        
        $callback($blueprint);
        
        try{
            $blueprint->build($connection, $grammar);
        } catch (\Exception $e){
            echo get_called_class() . " migrate error, use getLog() to see more.\r\n";
            $this->log[get_called_class()] = $e;
            return;
        }
        
        echo get_called_class() . " migrated.\r\n";
    }
    
    /**
     * Get the error logs.
     *
     * @return void
     */
    public function getLog(){
        return $this->log;
    }

}
