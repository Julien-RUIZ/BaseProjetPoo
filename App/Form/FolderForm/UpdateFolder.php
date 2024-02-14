<?php
$form->debutForm()
    ->ajoutLabelFor('update', 'Modifier nom du dossier')
    ->ajoutDiv(['class' =>'form'])
    ->ajoutInput('text', 'update',['id'=>'update', 'class'=>'form-control','maxlength'=>'20', 'value'=>$nameFolder, 'pattern'=>"^[0-9a-zA-ZÀ-ÿ\- ']+$"])
    ->ajoutBouton('ok', ['class' => 'btn-primary'])
    ->ajoutDivEnd()
    ->finForm();