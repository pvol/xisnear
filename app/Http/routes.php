<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

use Xisnear\Frame\Route;

/**
 * route config file
 * 
 * @author xisnear <service@xisnear.com>
 */

Route::group([
    'middleware' => ['before_mid', 'after_mid']], function ($route){
    /** demo */
//    $route->get('/', 'App\Http\Controllers\MainController@getIndex');
//    $route->controller('/main', 'App\Http\Controllers\MainController');
});
