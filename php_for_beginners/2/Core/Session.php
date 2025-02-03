<?php

namespace Core;

class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        if (isset($_SESSION['_flash'][$key])) {
            $value = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $value;
        }

        return $default;
    }

    public static function has($key) {
        return isset($_SESSION[$key]) || isset($_SESSION['_flash'][$key]);
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
        unset($_SESSION['_flash'][$key]);
    }

    public static function destroy() {
        session_destroy();
        $_SESSION = [];
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function user() {
        return self::get('user');
    }

    public static function flash($key, $value = null) {
        if (!isset($_SESSION['_flash'])) {
            $_SESSION['_flash'] = [];
        }

        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return $value;
        }

        if (isset($_SESSION['_flash'][$key])) {
            $value = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $value;
        }

        return null;
    }

    public static function hasFlash($key) {
        return isset($_SESSION['_flash'][$key]);
    }

    public static function clearFlash() {
        $_SESSION['_flash'] = [];
    }
} 