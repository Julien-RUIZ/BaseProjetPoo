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
        Redirect::redirectTo(URLBASE);
        exit();
    }
}