<?php

namespace App\Toolbox\UnusedNumber;

class SearchUnusedNumberColumn
{
    private $UnusedN;

    /**
     * @param $liste
     * @return void
     * Petite méthode qui va sélectionner l'id non utilisé
     * ex: si vous avez la liste d'id =[1,2,3,4,5,6] > va retourner 7
     * ex: si vous avez la liste d'id =[1,2,3,5,6,7] > va retourner 4
     */
    public function SearchUnusedNumber($liste){
        //$listes=[1,2,3,5,6];
        if(empty($liste)){
            $this->UnusedN = 1;
        }else{
            $maxvalue = max($liste)+1;
            for ($i = 1 ; $i <= $maxvalue; $i++){
                if(!in_array($i, $liste)){
                    $this->UnusedN = $i;
                    break;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getUnusedN()
    {
        return $this->UnusedN;
    }
}