<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Flow
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Flow;

/**
 * Dispatcher
 * 
 * @author xisnear <service@xisnear.com>
 */
class Dispatch
{
    /** @var hand dispatch handler */
    const HANDLER_HAND = 1;
    /** @var auto dispatch handler */
    const HANDLER_AUTO = 2;
    
    /** @dict handler class map */
    public static $handler_class = [
        self::HANDLER_HAND => "Xisnear\Flow\Dispatcher\HandDispatcher",
        self::HANDLER_AUTO => "Xisnear\Flow\Dispatcher\AutoDispatcher",
    ];
    
    /** @var handler for dispatch. */
    protected $handler;
    
    /**
     * new handler
     */
    public function __construct($handler = self::HANDLER_AUTO) {
        $this->handler = new $handler();
    }
    
    /**
     * dispatch the step
     * 
     * @param array ext [user_id]
     */
    public function dispatch($flow_id, $ext = []) {
        return $handler->handle($flow_id, $ext);
    }
}
