<?php

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
];

$routeToController = function($uri, $routes, $db): void {
    $basePath = "/" . explode(separator: "/", string: $uri)[1];
    if (array_key_exists(key: $basePath, array: $routes)) {
        require $routes[$basePath];
    } else {
        abort();
    }
};

$routeToController(uri: parse_url(url: $_SERVER['REQUEST_URI'])['path'], routes: $routes, db: $db);
