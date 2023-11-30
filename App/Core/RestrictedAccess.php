<?php

namespace App\Core;

class RestrictedAccess
{
    /**
     * Méthode qui va jouer le rôle d'accès restreint. La partie gestion produit ne peut être visible que s'il y a une connexion
     * et si l'id est valide
     * @return bool
     */
    public static function SoftwareAccess(){
        if(!empty($_SESSION['Id'])){
            return true;
        }else{
            $_SESSION['info'] = 'Merci de vous identifier afin d\'avoir accès a l\'espace demandé';
            Redirect::redirectTo(URLBASE.'/Users/Login');
            exit();
        }
    }
}