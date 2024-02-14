<?php

namespace App\Controllers\SubFolders;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Subfolders;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class AddSubfolderController
{
    private $fomAdd;

    public function addsubfolder($id, $idnum=Null){
        if(isset($_POST['name'])){
            $nomSubfolder = htmlspecialchars($_POST['name']);
            $sub = new Subfolders();
            $RegexaddSub = $sub->setTitre($nomSubfolder);
            if($RegexaddSub === true){ //test si le nom du sous dossier existe dans la bdd
                $sub->ListeSubfolder($id[0]);
                $liste = $sub->getListeSubfoldersName();
                if(!in_array($sub->getTitre(),$liste)){ // si le nom n'est pas dans la liste alors enregistre en bdd
                    $numUnique = new UnusedNumberColumn();
                    $numUnique->UnusedNumber($id);
                    $sub->addSubfolder($id[0], $sub->getTitre(), $numUnique->getValUnused());
                    $_SESSION['validation'] = 'Le sous-dossier a été ajouté, a votre liste, avec succès';
                    Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                    exit();
                }else{
                    $_SESSION['erreur'] = 'Merci d\'indiquer un nom de dossier non existant';
                    Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                    exit();
                }
            }else{
                $_SESSION['erreur'] = 'Merci de respecter la structure du nom du dossier. Maximum 20 caractères alphanumérique, avec ou sans espace et sans caractères spéciaux.';
                Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                exit();
            }
        }
        $this->RenderFormAddSubfolder();
    }

    private function RenderFormAddSubfolder(){
        $form = new Form();
        include_once FORM.'/SubfolderForm/AddSubfolder.php';
        $this->fomAdd = $form->create();
    }

    /**
     * @return mixed
     */
    public function getFomAdd()
    {
        return $this->fomAdd;
    }


}