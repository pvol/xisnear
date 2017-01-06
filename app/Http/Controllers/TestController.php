<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author pvol <pvol@163.com>
 */

namespace App\Http\Controllers;

/**
 * class test controller
 * 
 * @author pvol <pvol@163.com>
 */
class TestController extends Controller
{
    public function test(){
        $data = _config('database.mysql.driver');
//        $da = Test::find(1);
//        _dd($data, $da, _app()->route->uniq);
        _log()->info('111');
        _view('test', 'aaaaaa');
    }
}
