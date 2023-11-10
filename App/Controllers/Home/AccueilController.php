<?php

namespace App\Controllers\Home;

class AccueilController
{
    private $RouteInfo;

    /**
     * @return string[]
     */
    public function getRouteInfo(): array
    {
        return $this->RouteInfo = [
            'path'=>'Home' ,
            'class' => 'AccueilController',
            'methode'=>'pageprincipale' ];
    }


   public function pageprincipale(){
       echo 'Méthode page principale';
   }
}



