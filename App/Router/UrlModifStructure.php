<?php

namespace App\Router;

class UrlModifStructure
{

    private $IdValues = [];
    private $ReferralUrl;


    /**
     * @return array
     */
    public function getIdValues(): array
    {
        return $this->IdValues;
    }

    /**
     * @return mixed
     */
    public function getReferralUrl()
    {
        return $this->ReferralUrl;
    }

    /**
     * Modification de l'url en remplaçant les valeurs numériques par un id et sauvegarde les valeurs dans un tableau
     * @return void
     */
    public function ModifValueToId(array $tabUrlComponent){
                $nb=0;
        foreach ($tabUrlComponent as $key => $value){
            if(is_numeric($value)){
                $TabElement[]= 'id'.$nb;
                $this->IdValues[] =intval($value);
                $nb++;
            }else{
                $TabElement[] = $value;
            }
        }
        $this->ReferralUrl = implode('/', $TabElement);
    }
}







































