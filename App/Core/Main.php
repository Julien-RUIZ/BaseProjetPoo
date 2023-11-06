<?php

namespace App\Core;

use App\Configuration\config;
use App\Controllers\Historique\TestController;
use App\Controllers\Home\AccueilController;
use App\Route\Route;

class Main
{
    public function start(){
        //on démarre la session
        session_start();
        $urls = new Route();
        $urls->getanalyseurl();
    }





}