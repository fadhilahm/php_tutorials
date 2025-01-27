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
    $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        "id" => $params['id']
    ])->findOrFail();

    return view("notes/edit", [
        "banner" => "Edit Note",
        "errors" => $errors,
        "note" => $note
    ]);
}

$db->query("UPDATE notes SET title = :title, content = :content WHERE id = :id", [
    "id" => $params['id'],
    "title" => $_POST["title"],
    "content" => $_POST["content"]
]);

header("Location: /notes/" . $params['id']);
exit(); 