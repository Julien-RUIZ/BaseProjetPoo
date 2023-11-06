<?php

namespace App\Core;

class RedirectionManager {
    public static function redirectTo($url) {
        header("Location: $url");
        exit(); // Assurez-vous d'appeler exit() pour arrêter l'exécution du script après la redirection.
    }
}