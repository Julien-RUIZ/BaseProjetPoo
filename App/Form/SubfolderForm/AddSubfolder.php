<?php
$form->debutForm()
    ->ajoutLabelFor('name', 'Ajouter un sous-dossier')
    ->ajoutDiv(['class' =>'form'])
    ->ajoutInput('text', 'name', ['id'=>'name', 'class'=>'form-control','maxlength'=>'20', 'pattern'=>"^[0-9a-zA-ZÀ-ÿ\- ']+$"])
    ->ajoutBouton('ok', ['class' => 'btn-primary'])
    ->ajoutDivEnd()
    ->finForm();
