<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Flow
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Flow\Model;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 

/**
 * Flow
 * 
 * @author xisnear <service@xisnear.com>
 */
class Flow extends Eloquent
{
    protected $table = 'x_flows';
    
    /** @var status waiting for dispatch */
    const STATUS_DISPATCHING = 1;
    /** @var status waiting for operation */
    const STATUS_PROCESSING = 2;
    /** @var status over */
    const STATUS_OVER = 3;
    
    public static $status = [
        self::STATUS_DISPATCHING => 'dispatching',
        self::STATUS_PROCESSING => 'processing',
        self::STATUS_OVER => 'over',
    ];
}
