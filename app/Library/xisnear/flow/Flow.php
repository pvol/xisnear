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
 * Flow start
 * 
 * @author xisnear <service@xisnear.com>
 */
class Flow
{
    /**
     * get the flow list
     */
    public function lists($status = Model\Flow::STATUS_PROCESSING) {
        return Model\Flow::where('status', $status)->get();
    }
    
    /**
     * get the flow detail
     */
    public function info() {
        $response = [];
        $response['flow'] = Model\Flow::find($id);
        if (!$response['flow']) {
            throw new Exception\FlowException('not find flow by id');
        }
        $response['step'] = Model\Step::where('flow_id', $id)->get();
        return $response;
    }
    
    /**
     * create a new flow
     */
    public function create($params) {
        if(isset($params['id'])){
            $flow = Model\Flow::find($params['id']);
            if(!$flow){
                throw new Exception\FlowException('not find flow by id');
            }
        } else {
            $flow = new Model\Flow();
        }
        if(isset($params['project_id'])){
            $flow->project_id = $params['project_id'];
        }
        if(isset($params['config_id'])){
            $flow->config_id = $params['config_id'];
        }
        if(isset($params['step'])){
            $flow->step = $params['step'];
        }
        if(isset($params['status'])){
            $flow->status = $params['status'];
        } else {
            $flow->status = Model\Flow::STATUS_DISPATCHING;
        }
        $flow->save();
    }
}
