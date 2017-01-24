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
 * class flow controller
 * 
 * @author xisnear <service@xisnear.com>
 */
class FlowController extends Controller {
    
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
        echo __METHOD__;
    }

    /**
     * flow detail page
     */
    public function getDetail() {
        echo __METHOD__;
    }

}
