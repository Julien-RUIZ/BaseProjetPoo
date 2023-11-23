<?php

namespace App\Core;

use App\Models\UsersModel;

class EmailInfos
{
    public function EmailExist(string $Email){
        $userinfo = new UsersModel();
        $userTest = $userinfo->FindBy($Email);
        var_dump($userTest);
        if($userinfo->FindBy($Email) != false){
            return $userTest;
        }else{
            return false;
        }

    }

}