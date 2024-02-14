<?php

namespace App\Controllers\Users;

use App\Core\Render;
use App\Entity\Users;

class UsersController
{
    public function getUserInfo(){
        $users = new Users();
        $data = $users->FindById($_SESSION['Id']);
        Render::View('Users/AccountUsers', ['data'=>$data], 'LoginlogoutPage');
    }
}




