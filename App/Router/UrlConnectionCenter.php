<?php

namespace App\Router;

class UrlConnectionCenter
{


    /**
     * Méthode qui va centraliser les appels des différentes classes pour le fonctionnement du routeur
     * @return void
     */
    public function getUrlManager(){
        $extract = new UrlExtraction();
        $modif = new UrlModifStructure();
        $modif->ModifValueToId($extract->getSegmentUrlInArray());
        $MergePath = new SearchAndMergePaths();
        $MergePath->RequirePath();
        $MergePath->MergeTab();
        $UrlPath = new UrlToPath($MergePath->getPNCM());
        $UrlPath->CmpPathRouteWithParam($modif->getReferralUrl(),$modif->getIdValues() );

    }


}