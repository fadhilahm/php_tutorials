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
        require "views/{$code}.php";
        exit;
    }

    public function routeToController($uri, $attributes = []) {
        extract($attributes);

        $path = explode(separator: "/", string: $uri);
        $basePath = "/" . $path[1];
        $secondaryPath = isset($path[2]) ? "/" . $path[2] : "";

        foreach ($this->routes as $route) {
            if ($route['uri'] === $basePath && $route['method'] === $_SERVER['REQUEST_METHOD']) {
                return require $route['controller'];
            }
        }

        $this->abort();
    }
}
