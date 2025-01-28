<?php

use Core\Validator;
use Core\Session;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view("auth/register", [
        "banner" => "Register",
        "errors" => []
    ]);
    exit();
}

$errors = [];

// Validate name
if (Validator::string($_POST["name"], 1, 100) === false) {
    $errors["name"] = "Name must be between 1 and 100 characters";
}

// Validate email
if (Validator::email($_POST["email"]) === false) {
    $errors["email"] = "Please provide a valid email address";
} else {
    // Check if email already exists
    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        "email" => $_POST["email"]
    ])->find();

    if ($user) {
        $errors["email"] = "Email already exists";
    }
}

// Validate password
if (strlen($_POST["password"]) < 8) {
    $errors["password"] = "Password must be at least 8 characters";
} elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
    $errors["password"] = "Passwords do not match";
}

if (count($errors) > 0) {
    return view("auth/register", [
        "banner" => "Register",
        "errors" => $errors
    ]);
}

// Create the user
$user = [
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
    "created_at" => date('Y-m-d H:i:s'),
    "updated_at" => date('Y-m-d H:i:s')
];

$db->insert("users", $user);
$userId = $db->lastInsertId();

// Log the user in
Session::set('user', [
    'id' => $userId,
    'name' => $user['name'],
    'email' => $user['email']
]);

header("Location: /notes");
exit(); 