<?php

namespace App\Controllers\Users;

use App\Core\Form;
use App\Core\Render;

class LoginUsersController
{
    public function LoginUser(){

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        var_dump($email);
        var_dump($password);






    }

        $form = new Form();
        include_once FORM.'/UserForm/Login.php';
        Render::View('Users/LoginUsers', ['form' => $form->create()], 'StandardPage');
    }
}