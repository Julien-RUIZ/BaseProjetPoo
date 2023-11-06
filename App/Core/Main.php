<?php

namespace App\Core;

use App\Configuration\config;
use App\Controllers\Historique\TestController;
use App\Controllers\Home\AccueilController;
use App\Route\Route;

class Main
{
    public function start(){
        session_start();   //on démarre la session
        $urls = new Route();
        $urls->getanalyseurl();
    }





}