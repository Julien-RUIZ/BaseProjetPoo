<?php

namespace App\Core;

class Redirect {
    public static function redirectTo($url) {
        header("Location: $url");
        exit();
    }
}