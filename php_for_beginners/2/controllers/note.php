<?php

$id = explode(separator: "/", string: $uri)[2];

$currentUserId = 1;
$note = $db->query("SELECT notes.*, users.name FROM notes LEFT JOIN users ON notes.user_id = users.id WHERE notes.id = $id");

if (!$note) {
    abort(code: Response::NOT_FOUND);
}

$note = $note[0];
if ($note["user_id"] != $currentUserId) {
    abort(code: Response::FORBIDDEN);
}

$banner = "Note";
require "views/note.view.php";
