<?php

namespace Core\Middleware;

use Core\Session;

class Auth implements Middleware {
    public function handle() {
        if (!Session::isAuthenticated()) {
            header('Location: /login');
            exit();
        }
    }
} 