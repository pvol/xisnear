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
        
    }
    
    public function ruleTest(){
        $user = \App\Models\User::find(1);
        $user->useRule();
        $rule = \Xisnear\Rule\Rule::singleton();
        $rule->enforce('rule1');
    }
}
