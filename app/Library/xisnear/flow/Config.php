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
 * Flow config
 * 
 * @author xisnear <service@xisnear.com>
 */
class Config
{
    
    /**
     * get flow config list
     */
    public function getFlowConfigList() {
        return Model\FlowConfig::all();
    }
    
    /**
     * get flow and related step config
     */
    public function getFlowConfig($id) {
        $response = [];
        $response['flow'] = Model\FlowConfig::find($id);
        if (!$response['flow']) {
            throw new Exception\FlowException('not find flow by id');
        }
        $response['step'] = Model\FlowConfig::where('config_id', $id)->get();
        return $response;
    }
    
    /**
     * config flow save
     * 
     * @param array $params [id, title]
     */
    public function flowSave($params) {
        if(isset($params['id'])){
            $flow = Model\FlowConfig::find($params['id']);
            if(!$flow){
                throw new Exception\FlowException('not find flow by id');
            }
        } else {
            $flow = new Model\FlowConfig();
        }
        if(isset($params['title'])){
            $flow->title = $params['title'];
        }
        $flow->save();
    }
    
    /**
     * config step save
     */
    public function stepSave($params) {
        if(isset($params['id'])){
            $step = Model\StepConfig::find($params['id']);
            if(!$step){
                throw new Exception\FlowException('not find step by id');
            }
        } else {
            $step = new Model\StepConfig();
        }
        if(isset($params['config_id'])){
            $step->config_id = $params['config_id'];
        }
        if(isset($params['title'])){
            $step->title = $params['title'];
        }
        if(isset($params['dispatch'])){
            $step->dispatch = $params['dispatch'];
        }
        if(isset($params['template'])){
            $step->template = $params['template'];
        }
        if(isset($params['sortby'])){
            $step->sortby = $params['sortby'];
        }
        $step->save();
    }

}
