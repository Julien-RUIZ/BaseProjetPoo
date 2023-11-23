<?php

namespace App\Controllers\Home;

use App\Controllers\Product\ProductController;
use App\Core\Render;


class HomeController
{
    public function getHome(){
        return Render::View('Home/Home', [], 'WelcomePage');
    }
}