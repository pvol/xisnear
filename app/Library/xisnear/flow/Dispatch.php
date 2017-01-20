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
    const HANDLER_HAND_DISPATCH = 1;
    /** @var history dispatch handler */
    const HANDLER_HISTORY_DISPATCH = 2;
    /** @var auto dispatch handler */
    const HANDLER_AUTO_DISPATCH = 3;
    
    /** @dict handler class map */
    public static $handler_class = [
        self::HANDLER_HAND_DISPATCH => "Xisnear\Flow\Dispatcher\HandDispatch",
        self::HANDLER_HISTORY_DISPATCH => "Xisnear\Flow\Dispatcher\HistoryDispatch",
        self::HANDLER_AUTO_DISPATCH => "Xisnear\Flow\Dispatcher\AutoDispatch",
    ];
    
    /** @var handlers for dispatch, it will be used one by one. */
    protected $handlers;
    
    /**
     * new dispatcher
     */
    public function __construct($handlers = [self::HANDLER_HAND_DISPATCH, self::HANDLER_HISTORY_DISPATCH]) {
        $handler_instances = [];
        foreach($handlers as $handler){
            $handler_instances[] = new $handler();
        }
        $this->handlers = $handler_instances;
    }
    
    /**
     * dispatch the step
     * 
     * @param array ext [user_id]
     */
    public function dispatch($flow_id, $ext = []) {
        foreach($this->handlers as $handler){
            if($handler->handle($flow_id, $ext) !== true){
                break;
            }
        }
    }
}
