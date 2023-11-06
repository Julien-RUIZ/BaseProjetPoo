<?php
namespace App;

class Autoloader
{
    static function register(){
        // le spl_autoload_register permets de détecter les chargements de classes
        // S'il y a un appel de classe du style new test(); elle va lancer la méhtode autoload
        spl_autoload_register([__CLASS__, 'autoload']);

    }
    static function autoload($class){
        //On va récupérer dans $class la totalité du namespace de la classe
        // concerné exemple (App\client\Compte)
        // On retire App\

        $class = str_replace(__NAMESPACE__.'\\', '',$class);
        //A noter que __NAMESPACE__ fait appel a 'App' dans lequel nous nous trouvons
        // on remplace les \ par des /
        $class = str_replace('\\','/',$class);

        $fichier = __DIR__.'/'.$class.'.php'; //le fichier dans lequel se
        // trouve l'autoloader
        // on vérifie si le fichier existe

        if(file_exists($fichier)){
            require_once $fichier;
        }
    }
}

//Mettre dans l'index.php
//require_once 'Autoloader.php';
//Autoloader::register();