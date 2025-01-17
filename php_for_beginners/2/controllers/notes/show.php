<?php

use Core\Response;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $params['id']
])->findOrFail();

// uncomment the following line to authorize the current user
// authorize($currentUserId === $note['user_id']);

view("notes/show", [
    "banner" => "Note",
    "note" => $note
]);
