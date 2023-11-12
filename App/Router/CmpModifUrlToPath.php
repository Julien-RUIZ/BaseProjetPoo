<?php

namespace App\Router;

use App\Controllers\Home\AccueilController;

class CmpModifUrlToPath
{

    private $PCM = [
        [
            'path' => 'Historique/id0',
            'Namespace'=>'App\Controllers\Historique',
            'class' => 'LectureIdController',
            'methode' => 'lectureId'],
        [
            'path' => 'Home',
            'Namespace'=>'App\Controllers\Home',
            'class' => 'AccueilController',
            'methode' => 'pageprincipale'],
        [
            'path' => '',
            'Namespace'=>'App\Controllers\Home',
            'class' => 'AccueilController',
            'methode' => 'pageprincipale'],
    ];

    public function CmpPathRouteWithParam(string $ModifiedUrl, array $TabIdValues)
    {
        foreach ($this->PCM as $PCM) {
            $path = $PCM['path'];
            $tabPath[]=$path;
            $class = $PCM['class'];
            $methode = $PCM['methode'];
            $namespace = $PCM['Namespace'];
            if($ModifiedUrl === $path){
                $NC = $namespace.'\\'.$class;
                $inst = new $NC();
                if(empty($TabIdValues)){
                    call_user_func([$inst, $methode]);
                    break;
                }else{
                    call_user_func([$inst, $methode],$TabIdValues);
                }
            }
        }
        if(!in_array($ModifiedUrl, $tabPath)){
            echo 'il n\'est pas une url valable, page 404' ;
        }
    }


}