<?php

$form->debutForm("post")
    ->ajoutLabelFor('name', 'Nom' )
    ->ajoutInput('text', 'name', ['id'=>'name', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\s-]+$",'maxlength'=>'25' ])
    ->ajoutLabelFor('FirstName', 'Prénom')
    ->ajoutInput('text', 'FirstName', ['id'=>'FirstName', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\s-]+$",'maxlength'=>'25'])
    ->ajoutLabelFor('email', 'Email' )
    ->ajoutInput('text', 'email', ['id'=>'email', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$",'maxlength'=>'40'])
    //réaliser un ajout span error pour indiquer un message d'erreur qui apparâitra 
    ->ajoutLabelFor('password', 'Password' )
    ->ajoutInput('text', 'password', ['id'=>'password', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"])
    ->ajoutLabelFor('birthday', 'Birthday' )
    ->ajoutInput('date', 'birthday', ['id'=>'birthday', 'class' => 'form-control', 'required'=>true])
    ->ajoutBouton('Enregistrer', ['class' => 'btn btn-primary'])
    ->finForm();

// Test password :  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm
//- at least 8 characters
//- must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number
//- Can contain special characters



//mail : /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g