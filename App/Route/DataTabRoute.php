<?php

namespace App\Route;

class DataTabRoute
{
    protected $configRoute = [
        [
            'p'=>'Home' ,
            'controller'=> 'Home',
            'class' => 'AccueilController',
            'methode'=>'pageprincipale' ],
        [
            'p'=>'' ,
            'controller'=> 'Home',
            'class' => 'AccueilController',
            'methode'=>'pageprincipale' ],
        [
            'p'=>'Historique' ,
            'controller'=> 'Historique',
            'class' => 'TestController',
            'methode'=>'testmethode'],
        [
            'p'=>'Historique/id' ,
            'controller'=> 'Historique',
            'class' => 'LectureIdController',
            'methode'=>'lectureId'
        ]
    ];
}