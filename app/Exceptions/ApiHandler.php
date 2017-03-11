<?php

/**
 * core
 * 
 * @version 1.0
 * @package App
 * @ignore
 * 
 */

namespace App\Exceptions;

/**
 * class handle exception
 * 
 * 
 */
class ApiHandler
{
    /**
     * Report or log an exception.
     */
    public function report(\Exception $e)
    {
        $err_code = $e->getCode();
        if(empty($e->getCode())){
            $err_code = 1;
        }
        _json_response([], $err_code, $e->getMessage());
    }

}
