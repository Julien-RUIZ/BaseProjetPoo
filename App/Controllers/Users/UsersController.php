<?php

namespace App\Controllers\Users;

use App\Core\Form;
use App\Core\Render;
use App\Models\UsersModel;

class UsersController
{
    public function getUserInfo(){
        $users = new UsersModel();
        $data = $users->FindById($_SESSION['Id']);
        Render::View('Users/AccountUsers', ['data'=>$data], 'LoginlogoutPage');
    }
}




