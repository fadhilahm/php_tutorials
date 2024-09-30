<?php

$id = explode(separator: "/", string: $uri)[2];
$note = $db->query("SELECT notes.*, users.name FROM notes LEFT JOIN users ON notes.user_id = users.id WHERE notes.id = $id")[0];

$banner = "Note";
require "views/note.view.php";
