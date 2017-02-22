<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Flow
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Auth;

/**
 * Session
 * 
 * @author xisnear <service@xisnear.com>
 */
class Session
{
    
    private $client;
    
    public $session_id;
    
    public function __construct($session_id = null) {
        $cache_config = _config("database.redis.session");
        $this->client = new Predis\Client($cache_config['conn']);
        $this->client->select($cache_config['db']);
        $this->session_id = $session_id;
    }
    
    /**
     * 创建session
     */
    public function create($user){
        $this->session_id = sha1($user->id . time());
        return $this->client->set($this->session_id, $user->toArray());
    }
    
    /**
     * 销毁session
     */
    public function destrory(){
        return $this->client->del($this->session_id);
    }
    
    /**
     * 获取session中的内容
     */
    public function info(){
        return $this->client->get($this->session_id);
    }
}
