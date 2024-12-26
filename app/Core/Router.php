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
                    [$page, $action] = explode('@', $route['callback']);
                    
                    // Require the page file
                    $pageFile = __DIR__ . '/../Pages/' . $page . '.php';
            
                    if (file_exists($pageFile)) {
                        require_once $pageFile;
                        
                        // Instantiate the page and call the action
                        $pageInstance = new $page();
                        return $pageInstance->$action();
                    } else {
                        http_response_code(500);
                        echo "Page file not found: $pageFile";
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}