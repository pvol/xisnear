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
    /** @VAR default step when flow create */
    const DEFAULT_START_STEP = 2;
    
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
    public function create(int $project_id,int $config_id,int $start_step = self::DEFAULT_START_STEP ,int $status = Model\Flow::STATUS_DISPATCHING) {
        $flow = new Model\Flow();

        if(empty($project_id)){
            throw new Exception\FlowException('create flow without project id');
        }
        $project = Model\Project::find($project_id);
        if(!$project){
            throw new Exception\FlowException('create flow with error project id');
        }
        
        if(empty($config_id)){
            throw new Exception\FlowException('create flow without config id');
        }
        $config = Model\FlowConfig::find($config_id);
        if(!$config){
            throw new Exception\FlowException('create flow with error config id');
        }
        
        if(!is_numeric($start_step)){
            throw new Exception\FlowException('create flow with error start step');
        }
        
        if(!is_numeric($status)){
            throw new Exception\FlowException('create flow with error status');
        }
        
        $flow->project_id = $project_id;
        $flow->config_id = $config_id;
        $flow->step = $start_step;
        $flow->status = $status;
        
        $flow->save();
    }
}
