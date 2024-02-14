<?php

namespace App\Controllers\Users;

use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Users;

class DeleteUsersController
{
    public function DeleteUser(){
        $users = new Users();
        $users->Delete($_SESSION['Id']);
        session_destroy();
        session_unset();
        Redirect::redirectTo(URLBASE);
    }

    public function validationDelete(){
        $validation = 'Merci de valider la demande de suppression :';
        Render::View('Users/DeletePage', ['validation'=>$validation], 'LoginlogoutPage' );
    }
}