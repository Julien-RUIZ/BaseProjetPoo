<?php

namespace App\Controllers\Users;

use App\Core\Form;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Users;

class UpdateUsersController
{

    public function UpdateUser(){

        if(isset($_POST['Name']) && isset($_POST['FirstName']) && isset($_POST['Email'])
            && isset($_POST['Birthday']) && isset($_POST['Address']) && isset($_POST['PostalCode'])
            && isset($_POST['City']) && isset($_POST['Mobile']) ){
            $tableauCreate = [
                'Name'=>htmlspecialchars($_POST['Name']),
                'FirstName'=>htmlspecialchars($_POST['FirstName']),
                'Email'=>htmlspecialchars($_POST['Email']),
                'Birthday'=>htmlspecialchars($_POST['Birthday']),
                'Address'=>htmlspecialchars($_POST['Address']),
                'PostalCode'=>htmlspecialchars($_POST['PostalCode']),
                'City'=>htmlspecialchars($_POST['City']),
                'Mobile'=>htmlspecialchars($_POST['Mobile']),
                ];
            $user = new Users();
            $user->hydrate($tableauCreate);
            $user->Update($_SESSION['Id'], $user);
            $this->getUserInfo();
            $_SESSION['validation']='Vos informations ont été corrigées avec succès !!';
            Redirect::redirectTo(URLBASE.'/Users/Account');
            exit();
        }
        $this->getUserInfo();
    }

    /**
     * Formulaire de mise a jour de compte
     * @return null
     */
    public function RenderFormUpdate($user){
        $form = new Form();
        require_once \FORM.'/UserForm/Update.php';
        return Render::View('Users/UpdateUsers', ['form'=>$form->create()], 'LoginLogoutPage');
    }

    /**
     * Méthode qui va permettre de récupérer les données de l'utilisateur pour préremplir le formulaire de mise a jour de compte
     * @return void
     */
    public function getUserInfo(){
        $user = new Users();
        $update = $user->FindById($_SESSION['Id']);
        $user->hydrate($update);
        $this->RenderFormUpdate($user);
    }





}