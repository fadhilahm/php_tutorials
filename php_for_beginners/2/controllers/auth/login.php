<?php

use Core\Session;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view("auth/login", [
        "banner" => "Login"
    ]);
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

// Find user by email
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

// Check if user exists and password is correct
if (!$user || !password_verify($password, $user['password'])) {
    return view("auth/login", [
        "banner" => "Login",
        "error" => "Invalid credentials"
    ]);
}

// Log the user in
Session::set('user', [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email']
]);

header("Location: /notes");
exit(); 