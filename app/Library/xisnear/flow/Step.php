<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package Flow
 * @author xisnear <service@xisnear.com>
 */

namespace Xisnear\Flow;

use Xisnear\Flow\Exception\FlowException;

/**
 * Flow project config
 * 
 * @author xisnear <service@xisnear.com>
 */
class Step extends \Xisnear\Frame\Abstracts\Base
{
    /** @var instance of Flow\Flow */
    private $flow;
    
    /** @var instance of Flow\Project */
    private $project;
    
    public function __construct(Flow $flow) {
        $this->flow = $flow;
        $this->project = new Project($this->flow->project_id);
        parent::__construct();
    }
    
    /**
     * jump to other step
     */
    public function jumpTo($step_id){
        if(!$this->hasAuth()){
            throw new FlowException("没有权限操作此流程");
        }
        if(!$this->hasStep($step_id)){
            throw new FlowException("目标步骤有误");
        }
        // add operation log
        $this->stepLog();
        // modify flow
        $this->flow->data->step = $step_id;
        $this->flow->data->status = Models\Flow::STATUS_DISPATCHING;
        $this->flow->data->save();
        // delete current user from accepted_user
        $this->flow->removeAcceptedUser($this->user_id);
    }
    
    private function next($plus = 1){
        // todo
    }
    
    private function previous($plus = 1){
        // todo
    }
    
    /**
     * get step config
     */
    private function hasStep($step_id){
        foreach($this->project->config as $step_config){
            if($step_id === $step_config->id){
                return true;
            }
        }
        return false;
    }
    
    /**
     * check auth
     */
    private function hasAuth(){
        $accepted_users = explode(',', $this->flow->accepted_user);
        if(in_array($this->user_id, $accepted_users)){
            return true;
        }
        return false;
    }
    
    /**
     * add step log
     */
    private function stepLog(){
        Models\Step::create([
            'flow_id' => $this->flow->data->id,
            'step' => $this->flow->data->step,
            'status' => $this->flow->data->status,
            'created_user' => $this->user_id,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ]);
    }
}
