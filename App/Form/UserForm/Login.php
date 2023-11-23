<?php
$form->debutForm("post")
    ->ajoutLabelFor('email', 'Email' )
    ->ajoutInput('text', 'email', ['id'=>'email', 'class' => 'form-control', 'required'=>true, 'pattern'=>"/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",'maxlength'=>'40'])
    ->ajoutLabelFor('password', 'Password' )
    ->ajoutInput('text', 'password', ['id'=>'password', 'class' => 'form-control', 'required'=>true])
    ->ajoutBouton('Connexion', ['class' => 'btn btn-primary'])
    ->finForm();