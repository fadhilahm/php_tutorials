<?php
$banner = "Create a New Note";

require "Validator.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (Validator::string($_POST["title"], 1, 100) === false) {
        $errors["title"] = "Title must be between 1 and 100 characters";
    }

    if (Validator::string($_POST["content"], 1, 1000) === false) {
        $errors["content"] = "Content must be between 1 and 1000 characters";
    }

    if (count($errors) == 0) {
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
}

require "views/notes/create.view.php";
