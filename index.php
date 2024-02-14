<?php
// On importe les namespaces nécessaires
use App\Core\Main;
require_once __DIR__ . '/App/Configuration/Const.php';
require_once __DIR__ . '/App/Models/Queries/QuierieSubfolder.php';
require_once __DIR__ . '/App/Models/Queries/QuierieFolder.php';
require_once __DIR__ . '/App/Models/Queries/QuierieDoc.php';
require_once __DIR__ . '/App/Toolbox/UnusedNumber/QuierieSearchUnusedNumber.php';


require_once __DIR__ . '/vendor/autoload.php';
// On instancie Main
$app = new Main();
// On démarre l'application
$app->start();


