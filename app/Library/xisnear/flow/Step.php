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
    
    public $model;
    
    public function __construct(Flow $flow) {
        $this->flow = $flow;
        $this->model = Models\Step::find($flow->step);
        parent::__construct();
    }
    
    /**
     * jump to other step
     */
    public function jumpTo($step_id){
        $step = Models\Step::where('id', $step_id)->where('project_id', $this->flow->project_id)->first();
        if(!$step){
            throw new FlowException("目标步骤有误");
        }
        if(!$this->hasAuth()){
            throw new FlowException("没有权限操作此流程");
        }
        // add operation log
        $this->stepLog();
        // modify flow
        $this->flow->model->step = $step_id;
        $this->flow->model->status = Models\Flow::STATUS_DISPATCHING;
        $this->flow->model->save();
        // delete current user from accepted_user
        $this->flow->removeAcceptedUser($this->user_id);
        $this->flow->addAcceptedRole($step->role);
    }
    
    public function next($plus = 1){
        $step = Models\Step::where('project_id', $this->flow->project_id)
                ->where('sortby', '>', $this->model->sortby)
                ->orderBy('sortby', 'asc')
                ->skip($plus)
                ->first();
        $this->jumpTo($step->id);
    }
    
    public function previous($plus = 1){
        $step = Models\Step::where('project_id', $this->flow->project_id)
                ->where('sortby', '<', $this->model->sortby)
                ->orderBy('sortby', 'desc')
                ->skip($plus)
                ->first();
        $this->jumpTo($step->id);
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
            'flow_id' => $this->flow->model->id,
            'step' => $this->flow->model->step,
            'status' => $this->flow->model->status,
            'created_user' => $this->user_id,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ]);
    }
}
