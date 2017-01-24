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
 * step
 * 
 * @author xisnear <service@xisnear.com>
 */
class Step
{
    /** @var type jumpto = current+plus */
    const TYPE_PLUS = 1;
    /** @var type jumpto = number */
    const TYPE_NUMBER = 2;
    
    /**
     * step to other step
     */
    public function jump($flow_id, $number, $type = self::TYPE_PLUS) {
        $flow = Model\Flow::find($flow_id);
        $flow->step = $this->get_jumpto_step($flow->step, $number, $type);
        $flow->accepted_users = '';
        $flow->save();
    }
    
    /**
     * calculate jumpto step
     */
    private function get_jumpto_step($current, $number, $type){
        return 1;
    }
}
