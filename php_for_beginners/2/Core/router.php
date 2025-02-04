<?php

namespace Core;

use Core\Middleware\MiddlewareResolver;
use Core\Middleware\MiddlewareType;

// Previous classless implementation
// $routeToController = function($uri, $routes, $db): void {
//     $path = explode(separator: "/", string: $uri);
//     $basePath = "/" . $path[1];
//     $secondaryPath = isset($path[2]) ? "/" . $path[2] : "";
//     if ($secondaryPath && array_key_exists(key: $basePath . $secondaryPath, array: $routes)) {
//         require $routes[$basePath . $secondaryPath];
//     } elseif (array_key_exists(key: $basePath, array: $routes)) {
//         require $routes[$basePath];
//     } else {
//         abort();
//     }
// };

// $routes = require(base_path("routes.php"));
// $config = require "config.php";
// $db = new Database(config: $config['database']);
// $routeToController(uri: parse_url(url: $_SERVER['REQUEST_URI'])['path'], routes: $routes, db: $db);

class Router {
    protected $routes = [];

    public function add($method, $uri, $controller, ?string $middleware = null) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => $middleware
        ];

        return $this;
    }

    public function get($uri, $controller, ?string $middleware = null) {
        return $this->add('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, ?string $middleware = null) {
        return $this->add('POST', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, ?string $middleware = null) {
        return $this->add('DELETE', $uri, $controller, $middleware);
    }

    public function patch($uri, $controller, ?string $middleware = null) {
        return $this->add('PATCH', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, ?string $middleware = null) {
        return $this->add('PUT', $uri, $controller, $middleware);
    }

    public function route($uri, $method) {
        // First check if the route exists for any method
        $routeExists = false;
        $allowedMethods = [];
        
        foreach ($this->routes as $route) {
            if ($this->matchRoute($uri, $route['uri'])) {
                $routeExists = true;
                $allowedMethods[] = $route['method'];
                
                if ($route['method'] === strtoupper($method)) {
                    try {
                        MiddlewareResolver::resolve($route['middleware']);
                        return require base_path($route['controller']);
                    } catch (\Exception $e) {
                        Session::flash('error', $e->getMessage());
                        return $this->redirect('/');
                    }
                }
            }
        }
        
        if ($routeExists) {
            // Route exists but method not allowed
            $this->abort(Response::METHOD_NOT_ALLOWED);
        }

        // Route doesn't exist at all
        $this->abort(Response::NOT_FOUND);
    }

    protected function abort($code = Response::NOT_FOUND) {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    protected function redirect($path) {
        header("Location: {$path}");
        exit();
    }

    public function routeToController($uri, $attributes = []) {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        return $this->route($uri, $method);
    }

    private function matchRoute($uri, $route) {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([a-zA-Z0-9]+)', $route);
        $pattern = "@^" . $pattern . "$@D";
        return preg_match($pattern, $uri);
    }
}
