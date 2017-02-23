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
class Project extends \Xisnear\Frame\Abstracts\Base
{
    
    private $data;
    
    private $step;
    
    public function __construct($id = null) {
        if(is_null($id)){
            return;
        }
        $this->data = Models\Project::find($id);
        if(!$this->data){
            throw new FlowException("流程项目id有误");
        }
        $this->config = Model\FlowConfig::where('project_id', $id)->orderBy('sortby', 'asc')->get();
        if(!count($$this->config)){
            throw new Exception\FlowException('流程项目步骤配置为空');
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
