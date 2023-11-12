<?php

namespace App\Core;

use App\Configuration\config;
use App\Controllers\Historique\LectureIdController;
use App\Controllers\Home\AccueilController;
use App\Router\CmpModifUrlToPath;
use App\Router\ModifUrlStructure;
use App\Router\UrlExtraction;

class Main
{

    public function start()
    {

        $newurl = new UrlExtraction();
        $tabUrl = $newurl->getSegmentUrlInArray();
        $modifUrl = new ModifUrlStructure();
        $modifUrl->ModifValueToId($tabUrl);
        $CmpUrlRoute = new CmpModifUrlToPath();
        $CmpUrlRoute->CmpPathRouteWithParam($modifUrl->getReferralUrl(), $modifUrl->getIdValues());






    }
}