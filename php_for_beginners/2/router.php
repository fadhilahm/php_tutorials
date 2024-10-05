<?php

$routeToController = function($uri, $routes, $db): void {
    $basePath = "/" . explode(separator: "/", string: $uri)[1];
    if (array_key_exists(key: $basePath, array: $routes)) {
        require $routes[$basePath];
    } else {
        abort();
    }
};

$routes = require('./routes.php');
$routeToController(uri: parse_url(url: $_SERVER['REQUEST_URI'])['path'], routes: $routes, db: $db);
