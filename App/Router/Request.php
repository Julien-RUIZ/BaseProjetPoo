<?php

namespace App\Router;

class Request
{
    private $ServeurValue;

    public function __construct(){
        $this->ServeurValue = $_SERVER;
    }

    /**
     * @return mixed
     */
    public function getServeurValue($param)
    {
        return $this->ServeurValue[$param];
    }

}