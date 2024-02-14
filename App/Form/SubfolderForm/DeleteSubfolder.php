<?php
$form->debutForm()
    ->ajoutLabelFor('delete', 'Supprimer dossier')
    ->ajoutDiv(['class' =>'form'])
    ->ajoutInput('text', 'delete', ['id'=>'name', 'class'=>'form-control','maxlength'=>'20', 'pattern'=>"^[0-9a-zA-ZÀ-ÿ\- ']+$"])
    ->ajoutBouton('Ok', ['class' => 'btn-primary'])
    ->ajoutDivEnd()
    ->finForm();
