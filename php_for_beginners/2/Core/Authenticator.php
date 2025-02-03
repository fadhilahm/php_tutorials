<?php

namespace Core;

class Authenticator
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function attempt($email, $password)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->login($user);

        return true;
    }

    public function login($user)
    {
        Session::set('user', [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]);
    }

    public function logout()
    {
        Session::remove('user');
    }

    public function user()
    {
        return Session::user();
    }

    public function isAuthenticated()
    {
        return Session::isAuthenticated();
    }
} 