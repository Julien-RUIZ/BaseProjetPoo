<?php

namespace App\Entity;

use App\Models\SubfoldersModel;

class Subfolders extends SubfoldersModel
{
    protected $Titre;

    public function __construct(){
        $this->Table = 'subfolder';
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param mixed $Titre
     */
    public function setTitre($Titre): bool
    {
        if(preg_match("/^[0-9a-zA-ZÀ-ÿ\- ']+$/u", $Titre)){
            $this->Titre = $Titre;
            return true;
        }else{
            return false;
        }
    }


}