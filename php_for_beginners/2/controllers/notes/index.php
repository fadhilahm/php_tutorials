<?php

use Core\Session;

if (!Session::isAuthenticated()) {
    header('Location: /login');
    exit();
}

$userId = Session::user()['id'];

// require "views/notes/index.view.php";
view("notes/index", [
    "banner" => "Notes",
    "notes" => $db->query("
        SELECT notes.*, users.name 
        FROM notes
        LEFT JOIN users ON notes.user_id = users.id
        WHERE notes.user_id = :user_id", [
            'user_id' => $userId
        ])->get()
]);
