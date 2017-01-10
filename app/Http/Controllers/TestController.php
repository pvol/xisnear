<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Http\Controllers
 * @author xisnear <service@xisnear.com>
 */

namespace App\Http\Controllers;

/**
 * class test controller
 * 
 * @author xisnear <service@xisnear.com>
 */
class TestController extends Controller
{
    public function test(){
        
    }
    
    public function ruleTest(){
        $user = \App\Models\User::find(1);
        $user->useRule();
        $rule = \Xisnear\Rule\Rule::singleton();
        $rule->enforce('rule1');
    }
}
