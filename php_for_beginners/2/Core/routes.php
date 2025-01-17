<?php

use Core\Router;

// Previous classless implementation
// return [
//     "/" => "controllers/index.php",
//     "/about" => "controllers/about.php",
//     "/contact" => "controllers/contact.php",
//     "/notes" => "controllers/notes/index.php",
//     "/notes/create" => "controllers/notes/create.php",
//     "/note" => "controllers/notes/show.php",
// ];

$router->get("/", base_path("controllers/index.php"));

$router->get("/about", base_path("controllers/about.php"));

$router->get("/contact", base_path("controllers/contact.php"));

$router->get("/notes", base_path("controllers/notes/index.php"));
$router->get("/notes/create", base_path("controllers/notes/create.php"));
$router->post("/notes", base_path("controllers/notes/store.php"));
$router->get("/notes/{id}", base_path("controllers/notes/show.php"));
$router->delete("/notes/{id}", base_path("controllers/notes/destroy.php"));

