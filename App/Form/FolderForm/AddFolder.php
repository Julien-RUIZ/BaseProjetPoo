<?php
$form->debutForm()
    ->ajoutLabelFor('name', 'Ajouter un dossier')
    ->ajoutDiv(['class' =>'form'])
    ->ajoutInput('text', 'name', ['id'=>'name', 'class'=>'form-control','maxlength'=>'20', 'pattern'=>"^[0-9a-zA-ZÀ-ÿ\- ']+$"])
    ->ajoutBouton('Ok', ['class' => 'btn-primary'])
    ->ajoutDivEnd()
    ->finForm();