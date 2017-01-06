<?php 

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author pvol <pvol@163.com>
 */

namespace App\Exceptions;

/**
 * class error report
 * 
 * @author pvol <pvol@163.com>
 */
class Error
{
    const TYPE_404 = '404';
    
    public function report($type) {
        view('404');
    }

}
