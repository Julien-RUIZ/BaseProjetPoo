<?php

namespace App\Controllers\Users;

use App\Models\UsersModel;

class UsersController
{
    public function getUser(){
        $users = new UsersModel();
        $data = $users->FindAll();
        var_dump($data);
    }
}