<?php

namespace App\Core;

class Render
{
    public static function View(string $pathFile, array $data, string $template){
        extract($data);
        ob_start();
        require_once VIEW.$pathFile.'.php';
        $contenu =  ob_get_clean();
        require_once VIEW . '/Template/'.$template.'.php';
    }
}

