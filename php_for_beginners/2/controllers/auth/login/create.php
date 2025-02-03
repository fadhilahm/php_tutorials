<?php

use Core\Session;

view("auth/login", [
    "banner" => "Login",
    "errors" => Session::get('errors'),
    "email" => Session::get('old')['email'] ?? ''
]); 