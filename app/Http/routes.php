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
    
    // test
    $route->get('/test', 'App\Http\Controllers\TestController@test');
    
    // flow
    $route->get('/flow', 'App\Http\Controllers\FlowController@lists');
    $route->get('/detail', 'App\Http\Controllers\FlowController@detail');
    
    // home
    $route->get('/', 'App\Http\Controllers\FlowController@lists');
    
});
