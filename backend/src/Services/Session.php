<?php


namespace Sakura\App\Services;


class Session
{
    public function __construct()
    {
        session_start();
    }

    public function addToSession(string $key, mixed $item)
    {
        if(! empty($key) && ! empty($item)) {
            $_SESSION[$key] = $item;
        }
    }

    public function deleteFromSession(string $key)
    {
        if(! empty($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function updateSession(string $key, mixed $item)
    {
        if(! empty($key)) {
            $_SESSION[$key] = $item;
        }
    }

    public function deleteSession()
    {
        session_destroy();
        $_SESSION = [];
    }
}