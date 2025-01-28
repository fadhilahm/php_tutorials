<?php

$_SESSION['user'] = [
    'name' => 'John Doe',
    'email' => 'john@example.com'
];

view("index", [
    "banner" => "Home",
    "posts" => $db->query('SELECT * FROM posts')->get()
]);
