<?php

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
];

$routeToController = function($uri, $routes, $db): void {
    $abort = function ($code = 404): void {
        http_response_code(response_code: $code);
        require "views/{$code}.php";
    };    

    if (array_key_exists(key: $uri, array: $routes)) {
        require $routes[$uri];
    } else {
        $abort();
    }
};

$routeToController(uri: parse_url(url: $_SERVER['REQUEST_URI'])['path'], routes: $routes, db: $db);
