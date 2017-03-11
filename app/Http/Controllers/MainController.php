<?php 

/**
 * App
 * 
 * @version 1.0
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * main controller, home page
 */
class MainController extends Controller
{
    public function getIndex(){
        _view('home/index', $data);
    }
}
