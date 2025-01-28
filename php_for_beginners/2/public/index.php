<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

session_start();

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);

    require base_path("{$class}.php");
});

$container = new Core\Container();

$container->bind('Core\Database', function () {
$config = require base_path('config.php');
    return new Core\Database($config['database']);
});
Core\App::setContainer($container);

$router = new Core\Router();
require base_path("Core/routes.php");


$db = Core\App::resolve(\Core\Database::class);
$router->routeToController(parse_url($_SERVER['REQUEST_URI'])['path'], ['db' => $db]);
