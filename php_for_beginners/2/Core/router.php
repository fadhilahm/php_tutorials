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
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                MiddlewareResolver::resolve($route['middleware']);
                
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404) {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    public function routeToController($uri, $attributes = []) {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if ($this->matchRoute($uri, $route['uri']) && $route['method'] === $method) {
                // Extract route parameters
                if (strpos($route['uri'], '{') !== false) {
                    preg_match('@^' . preg_replace('/\{([a-zA-Z]+)\}/', '([a-zA-Z0-9]+)', $route['uri']) . '$@D', $uri, $matches);
                    array_shift($matches);
                    $attributes['params'] = ['id' => $matches[0]];
                }

                MiddlewareResolver::resolve($route['middleware']);
                extract($attributes);
                
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    private function matchRoute($uri, $route) {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([a-zA-Z0-9]+)', $route);
        $pattern = "@^" . $pattern . "$@D";
        return preg_match($pattern, $uri);
    }
}
