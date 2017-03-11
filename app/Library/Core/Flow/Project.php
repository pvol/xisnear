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
 * Flow project config
 * 
 * 
 */
class Project extends \Core\Frame\Abstracts\Base
{
    
    public $model;
    
    public function __construct($id = null) {
        if(is_null($id)){
            return;
        }
        $this->model = Models\Project::find($id);
        if(!$this->model){
            throw new FlowException("流程项目id有误");
        }
        parent::__construct();
    }
    
    /**
     * create a new flow
     */
    public function create(){
        $flow = new Flow();
        $flow->create($this)->addAcceptedUser($this->user_id);
        return $flow;
    }
}
