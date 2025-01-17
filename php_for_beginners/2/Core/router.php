<?php

namespace Core;

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
    private $routes = [];

    private function registerRoute($method, $uri, $controller) {
        array_push($this->routes, [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ]);
    }

    public function get($uri, $controller) {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }
    
    public function put($uri, $controller) {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        $this->registerRoute('PATCH', $uri, $controller);
    }

    public function abort ($code = Response::NOT_FOUND) {
        http_response_code($code);
        require base_path("views/{$code}.php");
        exit;
    }

    private function matchRoute($uri, $route) {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '([a-zA-Z0-9]+)', $route);
        $pattern = "@^" . $pattern . "$@D";
        return preg_match($pattern, $uri);
    }

    public function routeToController($uri, $attributes = []) {
        extract($attributes);

        $path = $uri;
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        foreach ($this->routes as $route) {
            if ($this->matchRoute($path, $route['uri']) && $route['method'] === $method) {
                $params = [];
                if (strpos($route['uri'], '{') !== false) {
                    preg_match('@^' . preg_replace('/\{([a-zA-Z]+)\}/', '([a-zA-Z0-9]+)', $route['uri']) . '$@D', $path, $matches);
                    array_shift($matches);
                    $params['id'] = $matches[0];
                }
                
                return require $route['controller'];
            }
        }

        $this->abort();
    }
}
