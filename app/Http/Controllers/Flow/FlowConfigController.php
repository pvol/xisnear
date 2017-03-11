<?php

/**
 * App
 * 
 * @version 1.0
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers\Flow;

use App\Http\Controllers\Controller;

/**
 * flow config controller
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
