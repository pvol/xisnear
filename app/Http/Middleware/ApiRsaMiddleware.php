<?php

/**
 * core
 * 
 * @version 1.0
 * @package App
 * @ignore
 * 
 */

namespace App\Http\Middleware;

use Core\Api\Exception\ApiException;

/**
 * class api middleware
 */
class ApiRsaMiddleware {
    
    private $business;
    
    private $partner;

    /**
     * Handle an outcoming request.
     * 
     * if the class name start with after,
     * it will run as an after middleware,
     * or it will run as a before middleware.
     */
    public function handle()
    {
        $this->partner = filter_input(INPUT_POST, 'partner', FILTER_SANITIZE_STRING);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $sign = filter_input(INPUT_POST, 'sign', FILTER_SANITIZE_STRING);
        
        $this->business = 'rc';
        
        // 初始化加密加签类
        $rsa = new \Core\Api\Crypt\RsaCrypt($this->business, $this->partner);
        
        // 解密
        $decrypt_data = $rsa->decrypt($content);
        
        if(empty($decrypt_data)){
            throw new ApiException("content decrypt error");
        }
        
        // 验签
        if(!$rsa->checkSign($decrypt_data, $sign)){
            throw new ApiException("sign error");
        }
        
        $_REQUEST['params'] = $decrypt_data;
    }

}
