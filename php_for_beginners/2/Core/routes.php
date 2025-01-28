<?php

use Core\Router;
use Core\Middleware\MiddlewareType;

// Previous classless implementation
// return [
//     "/" => "controllers/index.php",
//     "/about" => "controllers/about.php",
//     "/contact" => "controllers/contact.php",
//     "/notes" => "controllers/notes/index.php",
//     "/notes/create" => "controllers/notes/create.php",
//     "/note" => "controllers/notes/show.php",
// ];

$router->get("/", "controllers/index.php");

$router->get("/about", "controllers/about.php");

$router->get("/contact", "controllers/contact.php");

// Auth routes
$router->get("/register", "controllers/auth/register.php", MiddlewareType::GUEST->value);
$router->post("/register", "controllers/auth/register.php", MiddlewareType::GUEST->value);
$router->get("/login", "controllers/auth/login.php", MiddlewareType::GUEST->value);
$router->post("/login", "controllers/auth/login.php", MiddlewareType::GUEST->value);
$router->post("/logout", "controllers/auth/logout.php", MiddlewareType::AUTH->value);

// Notes routes - all require authentication
$router->get("/notes", "controllers/notes/index.php", MiddlewareType::AUTH->value);
$router->get("/notes/create", "controllers/notes/create.php", MiddlewareType::AUTH->value);
$router->post("/notes", "controllers/notes/store.php", MiddlewareType::AUTH->value);
$router->get("/notes/{id}", "controllers/notes/show.php", MiddlewareType::AUTH->value);
$router->get("/notes/{id}/edit", "controllers/notes/edit.php", MiddlewareType::AUTH->value);
$router->patch("/notes/{id}", "controllers/notes/update.php", MiddlewareType::AUTH->value);
$router->delete("/notes/{id}", "controllers/notes/destroy.php", MiddlewareType::AUTH->value);

