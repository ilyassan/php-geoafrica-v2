<?php

class Router
{
    private $routes = [];

    public function add($method, $path, $callback)
    {
        $this->routes[] = compact('method', 'path', 'callback');
    }

    public function dispatch($request)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->getMethod() &&
                $route['path'] === $request->getPath()) {
                
                if (is_callable($route['callback'])) {
                    return call_user_func($route['callback']);
                }
                
                if (is_string($route['callback'])) {
                    [$controller, $action] = explode('@', $route['callback']);
                    
                    // Require the controller file
                    $controllerFile = __DIR__ . '/../Pages/' . $controller . '.php';
            
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        
                        // Instantiate the controller and call the action
                        $controllerInstance = new $controller();
                        return $controllerInstance->$action();
                    } else {
                        http_response_code(500);
                        echo "Controller file not found: $controllerFile";
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}