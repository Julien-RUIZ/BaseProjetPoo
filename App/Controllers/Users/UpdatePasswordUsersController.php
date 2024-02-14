<?php

namespace App\Controllers\Users;

use App\Core\Form;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Users;

class UpdatePasswordUsersController
{
    public function UpdatePassword(){

        if(isset($_POST['Password1']) && isset($_POST['Password2']) ){
           if($_POST['Password1'] === $_POST['Password2'] ){
               $tableauCreate = [
                   'Password'=>htmlspecialchars($_POST['Password1']),
               ];
               $user = new Users();
               $user->hydrate($tableauCreate);
               $user->Update($_SESSION['Id'], $user);
               $_SESSION['validation']='Votre mot de passe à été corrigé avec succès !!';
               Redirect::redirectTo(URLBASE.'/Users/Account');
               exit();
           }else{
               $_SESSION['validation']='Merci d\'écrire un mot de passe identique sur les deux champs !!';
               Redirect::redirectTo(URLBASE.'/Users/UpdatePassword');
               exit();
           }
        }
        $this->RenderFormUpdatePassword();
    }

    /**
     * Formulaire de mise a jour de compte
     * @return null
     */
    public function RenderFormUpdatePassword(){
        $form = new Form();
        require_once \FORM.'/UserForm/UpdatePassword.php';
        return Render::View('Users/UpdatePasswordUsers', ['form'=>$form->create()], 'LoginLogoutPage');
    }
}