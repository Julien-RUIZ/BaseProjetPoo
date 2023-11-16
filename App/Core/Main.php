<?php
namespace App\Core;

use App\Controllers\Home\HomeController;
use App\Controllers\Product\ProductController;
use App\Router\Route\Route;
use App\Router\UrlConnectionCenter;

class Main
{
    public function start()
    {
        $UrlPath = new UrlConnectionCenter();
        $UrlPath->getUrlManager();
        $UrlPath->RequirePath();
    }
}