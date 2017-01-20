<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Flow
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Flow;

use  Illuminate\Database\Eloquent\Model  as Eloquent; 

/**
 * StepConfig
 * 
 * @author xisnear <service@xisnear.com>
 */
class StepConfig extends Eloquent
{
    protected $table = 'x_flow_step_configs';
}
