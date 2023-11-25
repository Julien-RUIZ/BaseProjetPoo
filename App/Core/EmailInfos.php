<?php

namespace App\Core;

use App\Models\UsersModel;

class EmailInfos
{
    /**
     * Test si le mail existe en bdd, si oui retourne un tableau de données et si non retourne le boolean false.
     * @param string $Email
     * @return false|mixed
     */
    public function EmailExist(string $Email){
        $userinfo = new UsersModel();
        $userTest = $userinfo->FindBy($Email);
        if($userinfo->FindBy($Email) != false){
            return $userTest;
        }else{
            return false;
        }
    }
}