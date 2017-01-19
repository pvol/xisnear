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
    'middleware' => ['before_mid', 'after_mid']], function (){
    
    // test
    Route::get('/test', 'App\Http\Controllers\TestController@test');
    
    // flow
    Route::get('/flow', 'App\Http\Controllers\FlowController@lists');
    Route::get('/detail', 'App\Http\Controllers\FlowController@detail');
    
    // home
    Route::get('/', 'App\Http\Controllers\FlowController@lists');
    
});
