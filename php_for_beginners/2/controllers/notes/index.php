<?php

// require "views/notes/index.view.php";
view("notes/index", [
    "banner" => "Notes",
    "notes" => $db->query("
        SELECT notes.*, users.name 
        FROM notes
        LEFT JOIN users ON notes.user_id = users.id")->get()
]);
