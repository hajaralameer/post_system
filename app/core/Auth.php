<?php

class Auth
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            header('Location: /login');
            exit;
        }
    }
}
