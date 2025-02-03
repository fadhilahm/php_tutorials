<?php

use Core\Session;
use Core\Authenticator;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    view("auth/login", [
        "banner" => "Login"
    ]);
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

$auth = new Authenticator($db);

if (!$auth->attempt($email, $password)) {
    return view("auth/login", [
        "banner" => "Login",
        "error" => "Invalid credentials"
    ]);
}

header("Location: /notes");
exit(); 