<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Modules;

use Xisnear\Flow;

/**
 * model
 * 
 * @author xisnear <service@xisnear.com>
 */
class FlowTask {

    /**
     * get flow task lists
     */
    public function getLists() {
        return Flow\Model\Flow::get();
    }
    
    /**
     * add new flow
     */
    public function createFlow($tpl) {
        return Flow\Model\Flow::create([
            'project_id' => 1,
        ]);
    }
    
    /**
     * statcs flow
     */
    public function getStatics() {
        $data = [];
        $data['flow_count'] = Flow\Model\Flow::count();
        $data['accepted_user_count'] = Flow\Model\Flow::groupby('accepted_users')->count();
        $data['created_user_count'] = Flow\Model\Flow::groupby('created_user')->count();
        return $data;
    }
    

}
