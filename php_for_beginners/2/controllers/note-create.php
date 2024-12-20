<?php
$banner = "Create a New Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note = [
        "title" => $_POST["title"],
        "content" => $_POST["content"],
    ];

    $notes[] = $note;

    $db->insert("notes", $note);
    $newNoteId = $db->lastInsertId();
    header("Location: /note/".$newNoteId.  "");
    exit();
}

require "views/note-create.view.php";
