<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);

    require base_path("{$class}.php");
});

$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$router = new Core\Router();
require base_path("Core/routes.php");

$router->routeToController(parse_url($_SERVER['REQUEST_URI'])['path'], ['db' => $db]);
