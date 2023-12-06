<?php

namespace App\Router;

use App\Controllers\Home\AccueilController;

class UrlToPath
{
    private array $PNCMs;

    public function __construct($PNCMs){
        $this->PNCMs = $PNCMs;
    }

    /**
     * Comparaison entre la structure de l'url sans les valeurs numériques avec le chemin
     * indiqué dans les fichiers Path du dossier Controller.
     * @param string $ReferralUrl url de référence sans valeur numérique provenant de la classe UrlModifStructure.
     * @param array $TabIdValues Valeur des id de l'url
     * @return void
     */
    public function CmpPathRouteWithParam(string $ReferralUrl, array $TabIdValues )
    {
        foreach ($this->PNCMs as $PCM) {
            $path = $PCM['path'];
            $tabPath[]=$path;
            $class = $PCM['class'];
            $methode = $PCM['methode'];
            $namespace = $PCM['namespace'];
            if($ReferralUrl === $path){
                $NC = $namespace.'\\'.$class;
                $inst = new $NC();
                if(empty($TabIdValues)){
                    call_user_func([$inst, $methode]);
                    break;
                }else{
                    call_user_func([$inst, $methode],$TabIdValues);
                    break;
                }
            }
        }
        if(!in_array($ReferralUrl, $tabPath)){
            echo 'il n\'est pas une url valable, page 404' ;
        }
    }
}