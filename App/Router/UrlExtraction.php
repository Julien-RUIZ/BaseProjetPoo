<?php

namespace App\Router;

use App\Configuration\Request;

class UrlExtraction
{

    private $SegmentUrlInArray = [];
    private $RequestUri;

    /**
     * @return mixed
     */
    public function getRequestUri()
    {
        return $this->RequestUri;
    }

    /**
     * @return mixed
     */
    public function getSegmentUrlInArray()
    {
        return $this->SegmentUrlInArray;
    }

    public function __construct(){
        $this->extract();
    }

    /**
     * Extraction de l'url et séparation des éléments dans un tableau.
     * @return void
     */
    public function extract(){
        $request = new Request();
        $this->RequestUri =$request->getP();
        //Séparation de l'url et rentrer données dans un tableau
        $this->SegmentUrlInArray = explode('/', trim($this->RequestUri, '/'));
    }
}
