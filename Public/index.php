<?php
// On importe les namespaces nécessaires
use App\Core\Main;
require_once __DIR__ . '/../App/Configuration/Const.php';

// Inclure l'autoloader généré par Composer
require_once __DIR__ . '/../vendor/autoload.php';
// On instancie Main
$app = new Main();
// On démarre l'application
$app->start();


