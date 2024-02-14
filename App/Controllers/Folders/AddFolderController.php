<?php

namespace App\Controllers\Folders;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Folders;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class AddFolderController
{
    protected $formAjout;
    public function AddFolder(){
        if(!empty($_POST['name'])){
            $NomDossier = htmlspecialchars($_POST['name']);
            $folder = new Folders();
            $boolsetTitre = $folder->setTitre($NomDossier);
            //récupération liste des titres des dossiers
            $folder->ListFolderName();
                //comparaison si le titre du dossier correspond au regex
                if($boolsetTitre !=true){
                    $_SESSION['erreur'] = 'Merci de respecter la structure du nom du dossier. Maximum 20 caractères, des lettres majuscules et/ou minuscules.';
                    Redirect::redirectTo(URLBASE.'/Documents');
                    exit();
                }else{
                    //comparaison si le titre que l'on souhaite ajouter existe dans la liste des titres des dossiers présents dans la bdd
                    if(in_array($folder->getTitre(),$folder->getFolders())){
                        $_SESSION['erreur'] = 'Le nom de dossier existe déjà, merci d\'intégrer un nom unique';
                        Redirect::redirectTo(URLBASE.'/Documents');
                        exit();
                    }else{
                        $numUnique = new UnusedNumberColumn();
                        $numUnique->UnusedNumber();
                        $folder->addFolder($folder->getTitre(), $numUnique->getValUnused());
                        $_SESSION['validation'] = 'Le nouveau dossier est ajouté a votre liste';
                    Redirect::redirectTo(URLBASE.'/Documents');
                    exit();
                    }
                }
        }
            $this->RenderFormAddFolder();
    }

    private function RenderFormAddFolder(){
        $form = new Form();
        include_once FORM.'/FolderForm/AddFolder.php';
        $this->formAjout = $form->create();
    }

    public function getformeAjout(){
        return $this->formAjout;
    }
}