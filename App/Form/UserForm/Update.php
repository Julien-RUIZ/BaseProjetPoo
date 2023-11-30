<?php

$form->debutForm("post")

    ->ajoutLabelFor('Name', 'Nom :' )
    ->ajoutInput('text', 'Name', ['id'=>'Name', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\-s]+$",'maxlength'=>'25', 'value'=>$user->getName() ])

    ->ajoutLabelFor('FirstName', 'Prénom :')
    ->ajoutInput('text', 'FirstName', ['id'=>'FirstName', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[A-Za-zÀ-ÿ\-s]+$",'maxlength'=>'25', 'value'=>$user->getFirstName()])

    ->ajoutLabelFor('Email', 'Email :' )
    ->ajoutInput('text', 'Email', ['id'=>'Email', 'class' => 'form-control', 'required'=>true, 'pattern'=>"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$",'maxlength'=>'40', 'value'=>$user->getEmail()])

    //->ajoutLabelFor('Password', 'Password :' )
    //->ajoutInput('text', 'Password', ['id'=>'Password', 'class' => 'form-control', 'pattern'=>"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$", 'Placeholder'=>'*****'])

    ->ajoutLabelFor('Birthday', 'Date de naissance :' )
    ->ajoutInput('date', 'Birthday', ['id'=>'Birthday', 'class' => 'form-control', 'required'=>true, 'value'=>$user->getBirthday()])

    ->ajoutLabelFor('Address', 'Adresse :' )
    ->ajoutInput('text', 'Address', ['id'=>'Address', 'class' => 'form-control', 'value'=>$user->getAddress()])

    ->ajoutLabelFor('PostalCode', 'Code postal :' )
    ->ajoutInput('text', 'PostalCode', ['id'=>'PostalCode', 'class' => 'form-control', 'value'=>$user->getPostalCode()])

    ->ajoutLabelFor('City', 'Ville :' )
    ->ajoutInput('text', 'City', ['id'=>'City', 'class' => 'form-control', 'value'=>$user->getCity()])

    ->ajoutLabelFor('Mobile', 'Téléphone mobile :' )
    ->ajoutInput('text', 'Mobile', ['id'=>'Mobile', 'class' => 'form-control', 'value'=>$user->getMobile()])

    ->ajoutBouton('Enregistrer', ['class' => 'btn btn-primary'])
    ->finForm();