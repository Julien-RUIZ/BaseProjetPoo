<?php

namespace App\Controllers\Users;

use App\Core\EmailInfos;
use App\Core\Form;
use App\Core\Redirect;
use App\Core\Render;

class LoginUsersController
{
    public function LoginUser(){
        if(empty($_SESSION['Id'])){ //test si $_session est vide
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $recupInfo = new EmailInfos();
                $recup = $recupInfo->EmailExist($email);
                if(!empty($recupInfo->EmailExist($email))){
                    if( password_verify($password, $recup->Password)){
                        $_SESSION['Id'] = $recup->Id;
                        $_SESSION['FirstName'] = $recup->FirstName;
                        $_SESSION['Email'] = $recup->Email;
                        $_SESSION['Birthday'] = $recup->Birthday;
                        $_SESSION['validation'] = 'Vous vous êtes connecté avec succès !!';
                        Redirect::redirectTo(URLBASE);
                        exit();
                    }else{
                        $_SESSION['erreur'] = 'Le mot de passe et/ou le mail sont incorrect';
                        Redirect::redirectTo(URLBASE.'/Users/Login');
                        exit();
                    }
                }else{
                    $_SESSION['erreur'] = 'Le mot de passe et/ou le mail sont incorrect';
                    Redirect::redirectTo(URLBASE.'/Users/Login');
                    exit();
                }
            }
        }elseif(!empty($_SESSION)){
            $_SESSION['validation'] = 'Vous vous êtes déjà connecté !!';
            Redirect::redirectTo(URLBASE);
            exit();
        }
        $this->RenderFormLogin();
    }

    /**
     * Formulaire d'identification d'utilisateur
     * @return void
     */
    public function RenderFormLogin(){
        $form = new Form();
        include_once FORM.'/UserForm/Login.php';
        Render::View('Users/LoginUsers', ['form' => $form->create()], 'LoginLogoutPage');
    }
}
