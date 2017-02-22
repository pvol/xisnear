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

/**
 * Cache
 * 
 * @author xisnear <service@xisnear.com>
 */
class Cache {
    
    private $client;
    
    public function __construct() {
        $cache_config = _config("database.redis.cache");
        $this->client = new Predis\Client($cache_config['conn']);
        $this->client->select($cache_config['db']);
    }
    
    public function set($key, $value, $expire){
        return $this->client->set($key, $value, $expire);
    }
    
    public function get($key){
        return $this->client->get($key);
    }

}
