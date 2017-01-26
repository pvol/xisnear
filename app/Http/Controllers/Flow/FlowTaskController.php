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

}
