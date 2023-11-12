<?php
// On importe les namespaces nécessaires
use App\Autoloader;
use App\Controllers\Historique\test;
use App\Core\Main;

include '../App/Configuration/Const.php';
// On importe l'Autoloader
require_once ROOT.'/App/Autoloader.php';
Autoloader::register();

// On instancie Main
$app = new Main();

// On démarre l'application
$app->start();


