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
 * Flow index
 * 
 * @author xisnear <service@xisnear.com>
 */
class Flow extends \Xisnear\Frame\Abstracts\Base
{
    
    private $data;
    
    public function __construct($id = null) {
        if(is_null($id)){
            return;
        }
        $this->data = Models\Flow::find($id);
        if(!$this->data){
            throw new FlowException("流程id有误");
        }
        parent::__construct();
    }
    
    /**
     * create new flow
     */
    public function create($project) {
        $this->data = new Models\Flow();
        $this->data->project_id = $project->project->id;
        $this->data->step = $project->config->first->id;
        $this->data->status = Models\Flow::STATUS_PROCESSING;
        $this->data->created_user = $this->user_id;
        $this->data->save();
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
        $accepted_users = explode(',', $this->data->accepted_user);
        if(!is_array($accepted_users)){
            $accepted_users = [];
        }
        $accepted_users[] = $user_id;
        $this->data->accepted_user = implode(',', array_unique($accepted_users));
        $this->data->save();
    }
    
    /**
     * remove accepted user
     */
    public function removeAcceptedUser($user_id){
        $accepted_users = explode(',', $this->data->accepted_user);
        foreach($accepted_users as $key => $accepted_user){
            if($user_id == $accepted_user){
                unset($accepted_users[$key]);
            }
        }
        $this->data->accepted_user = implode(',', array_unique($accepted_users));
        $this->data->save();
    }
}
