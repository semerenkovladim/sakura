<?php

namespace Sakura\App\Services;

class ValidateForm
{

    public function clean(string $data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function checkLength(string $data, int $min, int $max): bool
    {

        return (mb_strlen($data) >= $min && mb_strlen($data) <= $max);
    }

    public function isEmpty(string $data): bool
    {
        return empty($data);
    }
}