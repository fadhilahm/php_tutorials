<?php

$id = explode(separator: "/", string: $uri)[2];

$currentUserId = 1;
$note = $db->query("SELECT notes.*, users.name FROM notes LEFT JOIN users ON notes.user_id = users.id WHERE notes.id = :id", [
    "id" => $id
])->findOrFail();

authorize($currentUserId === $note['user_id']);


$banner = "Note";
require "views/note.view.php";
