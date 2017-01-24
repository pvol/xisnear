<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * main controller, home page
 * 
 * @author xisnear <service@xisnear.com>
 */
class MainController extends Controller
{
    public function getIndex(){
        _view('home/index', $data);
    }
}
