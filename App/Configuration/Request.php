<?php

namespace App\Configuration;

class Request
{
    private $ServeurValue;
    private $GetValue;

    public function __construct(){
        $this->ServeurValue = $_SERVER;
        $this->GetValue = $_GET;
    }
    /**
     * @return mixed
     */
    public function getServeurValue($param)
    {
        return $this->ServeurValue[$param];
    }

    public function getP(){
        if (isset($this->GetValue['p'])) {
            $params = $this->GetValue['p'];
            return $params;
        } else {
            $params = '';
            return $params;
        }
    }
}