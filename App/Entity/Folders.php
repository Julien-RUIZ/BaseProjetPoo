<?php

namespace App\Entity;

use App\Models\FoldersModel;

class Folders extends FoldersModel
{
    protected $Titre;

    protected $user_id;

    public function __construct()
    {
        $this->Table = 'folders';
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
    public function setTitre(string $Titre): bool
    {

        if(preg_match("/^[0-9a-zA-ZÀ-ÿ\- ']+$/u", $Titre)){
            $this->Titre = $Titre;
            return true;
        }else{
            return false;
        }
    }
}