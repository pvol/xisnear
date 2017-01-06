<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author pvol <pvol@163.com>
 */

use Xisnear\Frame\Route;

/**
 * route config file
 * 
 * @author pvol <pvol@163.com>
 */

Route::group([
    'middleware' => ['before_mid', 'after_mid']], function (){
    Route::get('/', 'App\Http\Controllers\TestController@test');
});
