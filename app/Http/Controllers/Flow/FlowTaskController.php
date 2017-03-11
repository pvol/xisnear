<?php

/**
 * App
 * 
 * @version 1.0
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers\Flow;

use App\Http\Controllers\Controller;
use Core\Flow\Model\ProjectConfig;
use Core\Flow\Model\Project;
use Exception;

/**
 * class flow task controller
 */
class FlowTaskController extends Controller {
    
    /**
     * flow index
     */
    public function getIndex() {
        _view('flow/index', $data);
    }

    /**
     * flow list page
     */
    public function getLists() {
        _view('flow/task/lists', $data);
    }

    /**
     * flow detail page
     */
    public function getDetail() {
        _view('flow/task/detail', $data);
    }

    /**
     * flow detail page
     */
    public function getCreate() {
        $project_id = $_GET['project_id'];
        $project = Project::find($project_id);
        if(!$project){
            throw new Exception('project id error.');
        }
        $data['config'] = ProjectConfig::where('project_id', $project_id)->orderBy('sortby', 'asc')->first();
        _view('flow/task/create', $data);
    }
}
