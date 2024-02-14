<?php

namespace App\Controllers\Folders;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Folders;

class UpdateFolderController
{

    private $formUpdate;
    public function UpdateFolder($id, $idnum=Null){
        if(isset($_POST['update'])){
            $upFolder = htmlspecialchars($_POST['update']);
            $updatefolder = new Folders();
            $RegexupFolder = $updatefolder->setTitre($upFolder);
            if($RegexupFolder === true){
                $updatefolder->UpdateFolder($id,$updatefolder->getTitre());
                $_SESSION['validation'] = 'Le nom du dossier a été modifié avec succès';
                Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                exit();
            }else{
                $_SESSION['erreur'] = 'Merci de respecter la structure du nom du dossier. Maximum 20 caractères alphanumérique, avec ou sans espace et sans caractères spéciaux.';
                Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                exit();
            }
        }
        $this->RenderFormUpdateFolder($id);
    }

    private function RenderFormUpdateFolder($id){
        $update = new Folders();
        $update->FolderNameForUpdate($id);
        $nameFolder = $update->getNamefolder();

        $form = new Form();
        include_once FORM.'/FolderForm/UpdateFolder.php';
        $this->formUpdate = $form->create();
    }

    /**
     * @return mixed
     */
    public function getFormUpdate()
    {
        return $this->formUpdate;
    }

}

