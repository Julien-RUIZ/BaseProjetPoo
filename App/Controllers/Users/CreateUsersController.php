<?php

namespace App\Controllers\Users;

use App\Core\Form;
use App\Core\Redirect;
use App\Core\Render;
use App\Models\UsersModel;

class CreateUsersController
{
    public function CreateUser(){
            if(!empty($_POST['name']) && !empty($_POST['FirstName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['birthday']) ){
                $Name = htmlspecialchars($_POST['name']);
                $Prenom = htmlspecialchars($_POST['FirstName']);
                $Email = htmlspecialchars($_POST['email']);
                $Password = password_hash($_POST['password'], PASSWORD_ARGON2I);
                $DateAnniv = htmlspecialchars($_POST['birthday']);
                $tableauCreate = ['Name'=>$Name, 'FirstName'=>$Prenom, 'Email'=>$Email, 'Password'=>$Password, 'Birthday'=>$DateAnniv];
                $user = new UsersModel();
                $createUser = $user->hydrate($tableauCreate);
                if($user->hydrate($tableauCreate) != false){
                    $createUser->create($user);
                    //$_SESSION['validation'] = 'Votre enregistrement est validé !';
                    Redirect::redirectTo(URLBASE);
                }else{
                    $_SESSION['erreur'] = 'Merci de renseigner les champs en respectant l\'ecriture';
                    Redirect::redirectTo(URLBASE.'/Users/Create');
                    exit();
                }
            }
        $form = new Form();
        include_once FORM.'/UserForm/Create.php';
        return Render::View('Users/CreateUsers', ['form'=>$form->create()], 'StandardPage');
    }
}