<?php
$banner = "Create a New Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (empty($_POST["title"])) {
        $errors["title"] = "Title is required";
    }

    if (strlen($_POST["title"]) > 100) {
        $errors["title"] = "Title must be less than 100 characters";
    }

    if (empty($_POST["content"])) {
        $errors["content"] = "Content is required";
    }

    if (strlen($_POST["content"]) > 1000) {
        $errors["content"] = "Content must be less than 1000 characters";
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

require "views/note-create.view.php";
