<?php

use Core\Session;
use Core\Authenticator;
use Core\Validators\LoginFormValidator;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view("auth/login", [
        "banner" => "Login"
    ]);
    exit();
}

$validator = new LoginFormValidator();

if (!$validator->validate($_POST)) {
    return view("auth/login", [
        "banner" => "Login",
        "errors" => $validator->errors(),
        "email" => $_POST['email'] ?? ''
    ]);
}

$auth = new Authenticator($db);

if (!$auth->attempt($_POST['email'], $_POST['password'])) {
    return view("auth/login", [
        "banner" => "Login",
        "error" => "Invalid credentials",
        "email" => $_POST['email']
    ]);
}

header("Location: /notes");
exit(); 