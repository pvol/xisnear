<?php

/**
 * print variables
 * 
 * usage: _dd($variable1, $variable2, ...)
 */
if (! function_exists('_dd')) {
    function _dd()
    {
        array_map(function ($x) {
            print_r($x); echo "<br>";
        }, func_get_args());

        die(1);
    }
}

/**
 * get environment variable
 * 
 * usage: _env('APP_ENV')
 */
if (! function_exists('_env')) {
    function _env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (strlen($value) > 1 && \App\Library\Str::startsWith($value, '"') && \App\Library\Str::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

/**
 * write log
 * 
 * usage: _log()->info($message)
 */
if (! function_exists('_log')) {
    function _log()
    {
        return Xisnear\Frame\Log::singleton()->logger;
    }
}

/**
 * check app_env which defined in .env
 * 
 * usage: _is_env('production')
 */
if(! function_exists('_is_env')){
    function _is_env($env, $equal = true){
        if($equal){
            return env('APP_ENV') === $env ? true : false;
        } else {
            return env('APP_ENV') === $env ? false : true;
        }
    }
}

/**
 * get base path
 * 
 * usage: _base_path()
 */
if(! function_exists('_base_path')){
    function _base_path(){
        return __DIR__ . '/../';
    }
}

/**
 * get app path
 * 
 * usage: _app_path()
 */
if(! function_exists('_app_path')){
    function _app_path(){
        return __DIR__;
    }
}

/**
 * get core path
 * 
 * usage: _core_path()
 */
if(! function_exists('_core_path')){
    function _core_path(){
        return __DIR__ . '/Library/xisnear/';
    }
}

/**
 * get storage path
 * 
 * usage: _storage_path()
 */
if(! function_exists('_storage_path')){
    function _storage_path(){
        return __DIR__ . '/../storage/';
    }
}

/**
 * get view path
 * 
 * usage: _view_path()
 */
if(! function_exists('_view_path')){
    function _view_path(){
        return __DIR__ . '/../resources/views/';
    }
}

/**
 * include view template
 * 
 * usage: _include()
 */
if(! function_exists('_include')){
    function _include($template){
        require _view_path() . $template . '.php';
    }
}

/**
 * go to the error page
 * 
 * usage: _abort()
 */
if (! function_exists('_abort')) {
    function _abort($type = 404)
    {
        $error = new App\Exceptions\Error();
        $error->report($type);
    }
}

/**
 * get config variables from config path
 * 
 * usage: _config('database.mysql')
 */
if (! function_exists('_config')) {
    function _config($param)
    {
        $file_path = "";
        $get_file = false;
        $config_path = "";
        for($i=0; $i < strlen($param); $i++){
            if(!$get_file && $param[$i] === '.'){
                if(file_exists(__DIR__ . '/../config/' . $file_path . '.php')){
                    $get_file = true;
                } else {
                    $file_path .= '/';
                }
            } else {
                if($get_file){
                    $config_path .= $param[$i];
                } else {
                    $file_path .= $param[$i];
                }
            }
        }
        if($get_file){
            $configs = require _base_path() . '/config/' . $file_path . '.php';
            return \App\Library\Arr::get($configs, $config_path);
        }
        return null;
    }
}

/**
 * get class \App\Core\App's object
 * 
 * usage: _app()->route
 */
if(! function_exists('_app')){
    function _app(){
        return Xisnear\Frame\App::singleton();
    }
}

/**
 * render the page by template
 * 
 * usage: _view('test', [])
 */
if(! function_exists('_view')){
    function _view($tpl, $data){
        return _app()->view->render($tpl, $data);
    }
}