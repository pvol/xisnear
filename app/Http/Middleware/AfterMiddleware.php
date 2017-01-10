<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App
 * @ignore
 * @author xisnear <service@xisnear.com>
 */

namespace App\Http\Middleware;

/**
 * class after middleware
 * 
 * @author xisnear <service@xisnear.com>
 */
class AfterMiddleware {

    /**
     * Handle an outcoming request.
     * 
     * if the class name start with after,
     * it will run as an after middleware,
     * or it will run as a before middleware.
     */
    public function handle()
    {
//        echo "auth after middleware.";
    }

}
