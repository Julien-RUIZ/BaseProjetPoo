<?php

namespace App\Controllers\Users;

use App\Core\Redirect;

class LogoutUsersController
{
    /**
     * Suppression des informations dans la super variable $_SESSION
     * @return void
     */
    public function LogoutUser(){
        session_destroy();
        session_unset();
        $_SESSION['validation'] = 'Vous vous êtes déconnecté avec succès, à bientôt !!';
        Redirect::redirectTo(URLBASE);
        exit();
    }
}