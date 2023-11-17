<?php

namespace App\Router;

class SearchAndMergePaths
{
    private array $PNCM;
    private array $RequirePaths;
    private array $Vartabs;

    /**
     * @return array
     */
    public function getPNCM(): array
    {
        return $this->PNCM;
    }

    /**
     * Suite au RequirePath, liste les fichiers path et éditer les requires dont nous avons besoin
     * pour fusionner tous les tableaux en un.
     * @return void
     */
    public function MergeTab(){
        $this->RequirePath();
        foreach ($this->RequirePaths as $RequirePath ){
            require CONTR.'/'.$RequirePath;
        }
        $Merge = implode(' , ', $this->Vartabs);
        $varMerge = [];
        foreach ($this->Vartabs as $vartab){
            $vartab = trim($vartab, '$');// Supprimer les guillemets autour des noms de variables
            $valeur = $$vartab;// Utiliser $$ pour accéder à la valeur de la variable
            $varMerge = array_merge($varMerge, $valeur); // faire un merge avec plusieurs tableaux
        }
        $this->PNCM = $varMerge;
    }

    /**
     * Fonction qui va récupérer la liste des fichiers se trouvant dans le dossier controller.
     * CONTR est déterminé dans le fichier Configuration/Const.php
     * @return void
     */
    public function RequirePath(){
        $files = scandir(CONTR);
        foreach ($files as $file){
            if(strpos($file, '.')===false){
                $case = scandir(CONTR.'\\'.$file);
                $filePath[] = $case;
            }
        }
        for($i = 0; $i< count($filePath); $i++){
            foreach ($filePath[$i] as $value){
                if(strpos($value, 'Path')===false){
                    $FinalPaths[] = $value;
                }else{
                    $varTab = substr($value, 0,  -4);
                    $this->Vartabs[] = '$'.$varTab;
                    $valuefinal = substr($value, 4,  -4);
                    $c = $valuefinal.'/'.$value;
                    $this->RequirePaths[]= $c;
                }
            }
        }
    }
}