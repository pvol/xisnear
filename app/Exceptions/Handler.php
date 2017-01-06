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
 * class handle exception
 * 
 * @author pvol <pvol@163.com>
 */
class Handler
{
    /**
     * Report or log an exception.
     */
    public function report(\Exception $e)
    {
        _view('error', $e->getMessage());
    }

}
