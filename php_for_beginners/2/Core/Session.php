<?php

namespace Core;

class Session {
    protected static $flash = [];

    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Load any existing flash data and clear it from the session
        self::$flash = $_SESSION['_flash'] ?? [];
        unset($_SESSION['_flash']);
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        return self::$flash[$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function has($key) {
        return isset(self::$flash[$key]) || isset($_SESSION[$key]);
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
    }

    public static function destroy() {
        session_destroy();
        $_SESSION = [];
        self::$flash = [];
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function user() {
        return self::get('user');
    }

    public static function flash($key, $value = null) {
        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return $value;
        }

        $value = self::$flash[$key] ?? null;
        unset(self::$flash[$key]);
        return $value;
    }

    public static function hasFlash($key) {
        return isset(self::$flash[$key]);
    }

    public static function clearFlash() {
        self::$flash = [];
    }
} 