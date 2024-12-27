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
        if ($request->getMethod() === 'POST') {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            $csrfToken = $_POST['csrf_token'] ?? $data['csrf_token'] ?? "";

            if (!validateCsrfToken($csrfToken)) {
                redirect('');
            }
        }
        foreach ($this->routes as $route) {
            $isRouteAcceptParam = strpos($route['path'], "/{id}") != false;
            $param = null;
            if ($isRouteAcceptParam) {
                $route['path'] = str_replace('/{id}', '', $route['path']);
                $param = str_replace($route['path'], '', $request->getPath());
            }

            $requestPath = $param ? str_replace($param, '', $request->getPath()) : $request->getPath();
            if ($route['method'] === $request->getMethod() &&
                $route['path'] === $requestPath) {
                
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
                        return $param != null ? $pageInstance->$action(str_replace("/", "", $param)) : $pageInstance->$action();
                    } else {
                        http_response_code(500);
                        echo "Page file not found: $pageFile";
                        return;
                    }
                }
            }
        }

        redirect('');
    }
}