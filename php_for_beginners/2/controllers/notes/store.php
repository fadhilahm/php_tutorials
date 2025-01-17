<?php

use Core\Validator;

$errors = [];

if (Validator::string($_POST["title"], 1, 100) === false) {
    $errors["title"] = "Title must be between 1 and 100 characters";
}

if (Validator::string($_POST["content"], 1, 1000) === false) {
    $errors["content"] = "Content must be between 1 and 1000 characters";
}

if (count($errors) > 0) {
    return view("notes/create", [
        "banner" => "Create a New Note",
        "errors" => $errors
    ]);
}

$note = [
    "title" => $_POST["title"],
    "content" => $_POST["content"],
];

$notes[] = $note;

$db->insert("notes", $note);
$newNoteId = $db->lastInsertId();
header("Location: /notes/" . $newNoteId .  "");
exit();
