<?php

namespace App\Controllers\Route;

class Route
{

    private $path;
    private $Namespace;
    private $Class;
    private $Methode;

    public function __construct($path, $Namespace, $Class, $Methode )
    {
        $this->path = $path;
        $this->Namespace = $Namespace;
        $this->Class = $Class;
        $this->Methode = $Methode;
        // sauvegarde des informations dans un tableau php ou Json
        echo 'la méthode d\'initialisation fonctionne';
    }


}

