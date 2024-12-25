<?php

class Request
{
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        
        $basePath = '/php-geoafrica-v2/public';
        if (strpos($path, $basePath) === 0) {
            $path = substr($path, strlen($basePath));
        }
        
        return parse_url($path, PHP_URL_PATH);
    }
}
