<?php

namespace Core\Middleware;

use Core\Session;

class Guest implements Middleware {
    public function handle() {
        if (Session::isAuthenticated()) {
            header('Location: /');
            exit();
        }
    }
} 