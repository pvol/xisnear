<?php 

/**
 * core
 * 
 * @version 1.0
 * @package Flow
 * 
 */

namespace Core\Flow;

use Core\Flow\Exception\FlowException;

/**
 * Flow index
 * 
 * 
 */
class Flow extends \Core\Frame\Abstracts\Base
{
    
    public $model;
    
    public function __construct($id = null) {
        if(is_null($id)){
            return;
        }
        $this->model = Models\Flow::find($id);
        if(!$this->model){
            throw new FlowException("流程id有误");
        }
        parent::__construct();
    }
    
    /**
     * get step instance
     */
    public function step() {
        return new Step($this);
    }
    
    /**
     * create new flow
     */
    public function create($project) {
        $this->model = new Models\Flow();
        $this->model->project_id = $project->project->id;
        $this->model->step = $project->config->first->id;
        $this->model->status = Models\Flow::STATUS_PROCESSING;
        $this->model->created_user = $this->user_id;
        $this->model->save();
    }
    
    /**
     * create new flow
     */
    public function publish() {
        $step = new Step($this);
        $step->next();
    }
    
    /**
     * jump to step
     */
    public function jumpTo($step_id) {
        $step = new Step($this);
        $step->jumpTo($step_id);
    }
    
    /**
     * add a new accepted user
     */
    public function addAcceptedUser($user_id){
        $accepted_users = explode(',', $this->model->accepted_user);
        if(!is_array($accepted_users)){
            $accepted_users = [];
        }
        $accepted_users[] = $user_id;
        $this->model->accepted_user = implode(',', array_unique($accepted_users));
        $this->model->save();
    }
    
    /**
     * remove accepted user
     */
    public function removeAcceptedUser($user_id){
        $accepted_users = explode(',', $this->model->accepted_user);
        foreach($accepted_users as $key => $accepted_user){
            if($user_id == $accepted_user){
                unset($accepted_users[$key]);
                break;
            }
        }
        $this->model->accepted_user = implode(',', array_unique($accepted_users));
        $this->model->save();
    }
    
    /**
     * add a new accepted role
     */
    public function addAcceptedRole($role_id){
        $accepted_roles = explode(',', $this->model->accepted_role);
        if(!is_array($accepted_roles)){
            $accepted_roles = [];
        }
        $accepted_roles[] = $role_id;
        $this->model->accepted_role = implode(',', array_unique($accepted_roles));
        $this->model->save();
    }
    
    /**
     * remove accepted role
     */
    public function removeAcceptedRole($role_id){
        $accepted_roles = explode(',', $this->model->accepted_role);
        foreach($accepted_roles as $key => $accepted_role){
            if($role_id == $accepted_role){
                unset($accepted_roles[$key]);
                break;
            }
        }
        $this->model->accepted_user = implode(',', array_unique($accepted_roles));
        $this->model->save();
    }
}
