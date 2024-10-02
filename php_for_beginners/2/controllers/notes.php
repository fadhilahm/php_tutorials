<?php

$banner = "Notes";

$notes = $db->query("
    SELECT notes.*, users.name 
    FROM notes
    LEFT JOIN users ON notes.user_id = users.id
")->get();

require "views/notes.view.php";
