<?php

if (! function_exists('_dd')) {
    function _dd()
    {
        array_map(function ($x) {
            print_r($x); echo "<br>";
        }, func_get_args());

        die(1);
    }
}

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

if (! function_exists('_log')) {
    function _log()
    {
        return Core\Frame\Log::singleton()->logger;
    }
}

if(! function_exists('_is_env')){
    function _is_env($env, $equal = true){
        if($equal){
            return env('APP_ENV') === $env ? true : false;
        } else {
            return env('APP_ENV') === $env ? false : true;
        }
    }
}

if(! function_exists('_base_path')){
    function _base_path(){
        return __DIR__ . '/../';
    }
}

if(! function_exists('_app_path')){
    function _app_path(){
        return __DIR__;
    }
}

if(! function_exists('_core_path')){
    function _core_path(){
        return __DIR__ . '/Library/Core/';
    }
}

if(! function_exists('_storage_path')){
    function _storage_path(){
        return __DIR__ . '/../storage/';
    }
}

if(! function_exists('_view_path')){
    function _view_path(){
        return __DIR__ . '/../resources/views/';
    }
}

if(! function_exists('_include')){
    function _include($template, $data=[]){
        require _view_path() . $template . '.php';
    }
}

if (! function_exists('_config')) {
    function _config($param)
    {
        $file_path = __DIR__ . '/../config/' . str_replace('.', '/', $param) . '.php';
        if(file_exists($file_path)){
            return require $file_path;
        }
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
            $configs = require __DIR__ . '/../config/' . $file_path . '.php';
            return \App\Library\Arr::get($configs, $config_path);
        }
        return null;
    }
}

if(! function_exists('_app')){
    function _app(){
        return Core\Frame\App::singleton();
    }
}

if(! function_exists('_view')){
    function _view($tpl, $data){
        return _app()->view->render($tpl, $data);
    }
}

if(! function_exists('_template')){
    function _template($name){
        \Core\Template\Template::singleton()->render($name);
    }
}

if (! function_exists('_json_response')) {
    function _json_response($data, $err_code = 0, $err_msg = "ok")
    {
        $response['err_code'] = $err_code;
        $response['err_msg'] = $err_msg;
        $response['data'] = $data;
        header("Content-type: application/json");
        echo json_encode($response);
        die(1);
    }
}