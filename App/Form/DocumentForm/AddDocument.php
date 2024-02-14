<?php
$form->debutForm('post')
    ->ajoutLabelFor('title', 'Titre')
    ->ajoutInput('text', 'title',  ['id'=>'title', 'class'=>'form-control','maxlength'=>'30'])
    ->ajoutLabelFor('text', 'Texte')
    ->ajoutTextarea('text', '',  ['id'=>'date', 'class'=>'form-control'])
    ->ajoutInput('hidden', 'date',  ['id'=>'date', 'class'=>'form-control', 'value'=>date('Y-m-d')])
    ->ajoutBouton('Validation',  ['id'=>'Validation', 'class' => 'btn-primary'])
    ->finForm();