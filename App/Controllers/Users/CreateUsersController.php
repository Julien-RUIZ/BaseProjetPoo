<?php

namespace App\Controllers\Users;

use App\Core\EmailInfos;
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
                $Password = $_POST['password'];
                $DateAnniv = htmlspecialchars($_POST['birthday']);
                $tableauCreate = ['Name'=>$Name, 'FirstName'=>$Prenom, 'Email'=>$Email, 'Password'=>$Password, 'Birthday'=>$DateAnniv];
                $emailInfo = new EmailInfos();
                $TestEmail = $emailInfo->EmailExist($Email); //test si le mail existe dans la bdd

                if($TestEmail == false){ //si le mail n'existe pas
                    $user = new UsersModel();
                    if(empty($user->hydrate($tableauCreate))){ //si liste d'erreur de l'hydratation est vide création du user
                        $user->create($user);
                        $_SESSION['validation'] = 'Votre enregistrement est validé. Connectez vous afin de profiter de tous les avantages du site.';
                        Redirect::redirectTo(URLBASE.'/Users/Login');
                    }elseif(!empty($user->hydrate($tableauCreate))){ //si liste n'est pas vide message d'erreur
                        $errors = implode(' , ', $user->hydrate($tableauCreate));
                        $_SESSION['erreur'] = 'Merci de renseigner les champs en respectant l\'ecriture pour les champs suivant : '.$errors;
                        Redirect::redirectTo(URLBASE.'/Users/Registration');
                        exit();
                    }
                }else{ // si le mail existe message d'erreur
                    $_SESSION['erreur'] = 'Le mail que vous utilisez est déjà dans notre base de donnée. 
                    Merci de vous connecter en utilisant ces informations ou d\'utiliser une nouvelle adresse mail.';
                    Redirect::redirectTo(URLBASE.'/Users/Registration');
                    exit();
                }
            }
        $this->RenderFormCreate();
    }

    /**
     * Formulaire de création de compte
     * @return null
     */
    public function RenderFormCreate(){
        $form = new Form();
        include_once FORM.'/UserForm/Create.php';
        return Render::View('Users/CreateUsers', ['form'=>$form->create()], 'LoginLogoutPage');
    }

}