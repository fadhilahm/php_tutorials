<?php

use Core\Database;

$routeToController = function($uri, $routes, $db): void {
    $path = explode(separator: "/", string: $uri);
    $basePath = "/" . $path[1];
    $secondaryPath = isset($path[2]) ? "/" . $path[2] : "";
    if ($secondaryPath && array_key_exists(key: $basePath . $secondaryPath, array: $routes)) {
        require $routes[$basePath . $secondaryPath];
    } elseif (array_key_exists(key: $basePath, array: $routes)) {
        require $routes[$basePath];
    } else {
        abort();
    }
};

$routes = require(base_path("routes.php"));
$config = require "config.php";
$db = new Database(config: $config['database']);
$routeToController(uri: parse_url(url: $_SERVER['REQUEST_URI'])['path'], routes: $routes, db: $db);
