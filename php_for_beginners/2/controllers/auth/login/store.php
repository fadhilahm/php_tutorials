<?php

use Core\Session;
use Core\Authenticator;
use Core\Validators\LoginFormValidator;

$validator = new LoginFormValidator();

if (!$validator->validate($_POST)) {
    Session::flash('errors', $validator->errors());
    Session::flash('old', [
        'email' => $_POST['email'] ?? ''
    ]);
    
    header('Location: /login');
    exit();
}

$auth = new Authenticator($db);

if (!$auth->attempt($_POST['email'], $_POST['password'])) {
    Session::flash('errors', 'Invalid credentials');
    Session::flash('old', [
        'email' => $_POST['email']
    ]);
    
    header('Location: /login');
    exit();
}

header('Location: /notes');
exit(); 