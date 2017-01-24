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
 * flow config controller
 * 
 * @author xisnear <service@xisnear.com>
 */
class FlowConfigController extends Controller {

    /**
     * flow config list page
     */
    public function getLists() {
        _view('flow/config/lists', $data);
    }

    /**
     * flow config detail page
     */
    public function getDetail() {
        _view('flow/config/detail', $data);
    }

    /**
     * save flow detail
     */
    public function postDetail() {
        echo __METHOD__;
    }
}
