<?php

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $params['id']
])->findOrFail();

view("notes/edit", [
    "banner" => "Edit Note",
    "errors" => [],
    "note" => $note
]);
