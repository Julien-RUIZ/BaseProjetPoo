<?php

namespace App\Router;

class UrlExtraction
{

    private $SegmentUrlInArray;
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
        // Récupération de l'url
        $this->RequestUri = $request->getServeurValue('REQUEST_URI');
        //Séparation de l'url et rentrer données dans un tableau
        $this->SegmentUrlInArray = explode('/', trim($this->RequestUri, '/'));
    }
}
