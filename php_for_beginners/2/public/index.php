<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require base_path("{$class}.php");
});

use Core\Session;
use Core\Response;
use Core\ValidationException;

try {
    Session::start();

    $container = new Core\Container();

    $container->bind('Core\Database', function () {
        $config = require base_path('config.php');
        return new Core\Database($config['database']);
    });
    Core\App::setContainer($container);

    $router = new Core\Router();
    require base_path("Core/routes.php");

    $db = Core\App::resolve(\Core\Database::class);
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $router->routeToController($uri, ['db' => $db]);

} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);
    
    return redirect($_SERVER['HTTP_REFERER']);
} catch (\PDOException $e) {
    // Database connection errors
    error_log($e->getMessage());
    http_response_code(500);
    view("500", [
        'heading' => 'Database Error',
        'message' => 'Sorry, there was an error connecting to the database.'
    ]);
} catch (\Exception $e) {
    // General errors
    error_log($e->getMessage());
    http_response_code(500);
    view("500", [
        'heading' => 'Server Error',
        'message' => 'Sorry, something went wrong on our end.'
    ]);
} finally {
    Session::clearFlash();
}