<?php

/**
 * App
 * 
 * @version 1.0
 * @package App
 * @ignore
 */

use Core\Frame\Route;

/**
 * route config file
 */

Route::group([
    'middleware' => ['before_mid', 'after_mid']], function ($route){
    
    $route->get('/', 'App\Http\Controllers\MainController@getIndex');
    
    $route->controller('/main', 'App\Http\Controllers\MainController');
    
    $route->controller('/config', 'App\Http\Controllers\Flow\FlowConfigController');
    $route->controller('/flow', 'App\Http\Controllers\Flow\FlowTaskController');
});
