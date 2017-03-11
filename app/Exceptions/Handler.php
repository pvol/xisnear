<?php

/**
 * core
 * 
 * @version 1.0
 * @package App
 * @ignore
 */

namespace App\Exceptions;

/**
 * class handle exception
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
