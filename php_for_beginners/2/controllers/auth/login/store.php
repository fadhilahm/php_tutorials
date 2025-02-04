<?php

use Core\Authenticator;
use Core\Validators\LoginFormValidator;

$auth = new Authenticator($db);

LoginFormValidator::validateCredentials($_POST, $auth);

header('Location: /notes');
exit(); 