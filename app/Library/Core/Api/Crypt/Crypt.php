<?php

namespace Core\Api\Crypt;

abstract class Crypt
{
    
    abstract public function encrypt($data);
    
    abstract public function decrypt($data);
}