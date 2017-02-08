<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Http\Controllers\Flow;

use App\Http\Controllers\Controller;
use App\Modules\FlowTask;

/**
 * class flow task controller
 * 
 * @author xisnear <service@xisnear.com>
 */
class FlowTaskController extends Controller {
    
    /**
     * flow index
     */
    public function getIndex() {
        $flow_task = new FlowTask();
        $data['statics'] = $flow_task->getStatics();
        _dd($data);
        _view('flow/index', $data);
    }

    /**
     * flow list page
     */
    public function getLists() {
        $flow_task = new FlowTask();
        $data['lists'] = $flow_task->getLists();
        dd($data);
        _view('flow/task/lists', $data);
    }

    /**
     * flow detail page
     */
    public function getDetail() {
        _view('flow/task/detail', $data);
    }

}
