<?php

namespace App\Controllers\Soft;

use App\Core\Redirect;
use App\Core\Render;

class WorkspaceSoft
{
    public function Workespace(){
        if($this->SoftwareAccess()===true){
            $test='coucou';
            Render::View('Soft/Soft', ['test'=>$test], 'SoftPage');
        }
    }

    /**
     * Méthode qui va jouer le rôle d'accès restreint. La partie gestion produit ne peut être visible que s'il y a une connexion
     * et si l'id est valide
     * @return bool
     */
    public function SoftwareAccess(){
        if(!empty($_SESSION['Id'])){
            return true;
        }else{
            $_SESSION['info'] = 'Merci de vous identifier afin d\'avoir accès a l\'espace de travail du logiciel.';
            Redirect::redirectTo(URLBASE.'/Users/Login');
            exit();
        }
    }
}