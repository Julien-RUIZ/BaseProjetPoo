<?php

$form->debutForm("post")
    ->ajoutLabelFor('name', 'Nom :' )
    ->ajoutInput('text', 'name', ['id'=>'name', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\-s]+$",'maxlength'=>'25' ])
    ->ajoutLabelFor('FirstName', 'Prénom :')
    ->ajoutInput('text', 'FirstName', ['id'=>'FirstName', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\-s]+$",'maxlength'=>'25'])
    ->ajoutLabelFor('email', 'Email :' )
    ->ajoutInput('text', 'email', ['id'=>'email', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$",'maxlength'=>'40'])
    ->ajoutLabelFor('password', 'Password :' )
    ->ajoutInput('text', 'password', ['id'=>'password', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"])
    ->ajoutLabelFor('birthday', 'Date de naissance :' )
    ->ajoutInput('date', 'birthday', ['id'=>'birthday', 'class' => 'form-control', 'required'=>true])
    ->ajoutBouton('Enregistrer', ['class' => 'btn btn-primary'])
    ->finForm();


