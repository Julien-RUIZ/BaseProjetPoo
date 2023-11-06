<?php

namespace App\Route;

class Route extends DataTabRoute
{
    private $url;
    private $urlTab=[];
    private $controller;
    private $class;
    private $methode;
    private $id;
    
    /**
     * Méthode globale qui va récupérer l'url passé à celui se trouvant dans le tableau
     * @return void
     */
    public function getanalyseurl(){
        $recupUrl = $this->configRoute;
            if( isset($_GET['p'])){
                $urlp =  htmlspecialchars($_GET['p']);
                $this->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
                if ($this->id != null) {
                    $urlp = $urlp . "/id";
                }
            }elseif(!isset($_GET['p'])){
                    $urlp = '';
            }

        $this->NoEndSlash($_SERVER['REQUEST_URI']);
        $this->hydrateConfigRoute($recupUrl, $urlp);
    }

    /**
     * Récupération des éléments dans le tableau.
     * @param $recupUrl
     * @param $urlp
     * @return void
     */
    public function hydrateConfigRoute($recupUrl, $urlp){
        foreach ($recupUrl as $key) {
            $this->url = $key['p'];
            array_push($this->urlTab, $this->url);
            $this->controller = $key['controller'];
            $this->class = $key['class'];
            $this->methode = $key['methode'];
            $this->cmpUrl($urlp, $this->url);
        }
        $this->UrlIsNot($urlp);
    }

    /**
     * Méthode utiliser pour cmpUrl(), Tester si la méthode et la classe existe en fonction du lien et si l'id existe
     * @param $lien
     * @return void
     */
    public function searchMetClass($lien){
        if(class_exists($lien)){ // si la classe existe
            $inst = new $lien; // instanciation en fonction du lien déterminé dans cmpUrl()
            if(method_exists($inst, $this->methode) && $this->id === null){
                $meth = $this->methode;
                $inst->$meth();
            }elseif (method_exists($inst, $this->methode) && $this->id != null){
                $meth = $this->methode;
                $inst->$meth($this->id);
            }
        }else{
            echo 'la classe n\'existe pas';
        }
    }

    /**
     * Suite a l'hydratation comparaison d'url avec les informations du tableau afin de déterminer le lien de la classe
     * @param $urlp C'est p de l'url que nous avons à un instant t
     * @param $url C'est l'url que nous avons déterminé dans le tableau
     * @return void
     */
    public function cmpUrl($urlp, $url){
            if($urlp === $url){
                $lien = '\\App\\Controllers\\'.$this->controller.'\\'.$this->class; //lien de la class pour l'instanciation
                $this->searchMetClass($lien);
            }
    }

    /**
     * C'est la méthode qui va tester si le paramètre passé en url existe dans notre liste d'url, sinon 404
     * @param $urlp
     * @return void
     */

    public function UrlIsNot($urlp){
        if(!in_array($urlp, $this->urlTab)) {
            echo 'il n\'y a pas l\'url dans le tableau, faire une 404';
        }
    }

    /**
     * Déterminer s'il y a / en fin et si oui réécrire l'url sans.
     * @param $urlp
     * @return void
     */
    public function NoEndSlash($urlp){
        if(!empty($_GET['p']) && strpos($urlp, '/', -1)!= false ){
            $urlpfinal = substr($_SERVER['REQUEST_URI'], 0, -1);
            var_dump($urlpfinal);
            http_response_code(301);
            header('LOCATION: '.$urlpfinal);
        }
    }





}