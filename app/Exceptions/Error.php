<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

namespace App\Exceptions;

/**
 * class error report
 * 
 * @author xisnear <service@xisnear.com>
 */
class Error
{
    const TYPE_404 = '404';
    
    public function report($type) {
        view('404');
    }

}
