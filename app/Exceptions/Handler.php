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
 * class handle exception
 * 
 * @author xisnear <service@xisnear.com>
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
