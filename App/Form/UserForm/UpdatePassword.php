<?php

$form->debutForm("post")

    ->ajoutLabelFor('Password1', 'Password :' )
    ->ajoutInput('text', 'Password1', ['id'=>'Password1', 'class' => 'form-control', 'pattern'=>"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$", 'Placeholder'=>'*****'])

    ->ajoutLabelFor('Password2', 'Confirmation du password :' )
    ->ajoutInput('text', 'Password2', ['id'=>'Password2', 'class' => 'form-control', 'pattern'=>"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$", 'Placeholder'=>'*****'])

    ->ajoutBouton('Enregistrer', ['class' => 'btn btn-primary'])
    ->finForm();
