<?php


namespace Sakura\App\Services;


class Cookie
{
    public function setCookie(string $key, string $value, int $expressionTime)
    {
        setcookie($key, $value, time() + $expressionTime);
    }

    public function deleteCookie($key)
    {
        setcookie($key, '', time() - 10);
    }

    public function updateCookie($key, $value)
    {
        $_COOKIE[$key] = $value;
    }
}