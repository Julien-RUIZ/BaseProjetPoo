<?php

namespace App\Controllers\Folders;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;

class DeleteFolderController
{
    private $formDelete;
    public function deleteFolder(){
        if(isset($_POST['delete'])){
            $nomFolder =$_POST['delete'];
            //vérification si nom de dossier dans la bdd
            $namFolder = new Folders();
            $namFolder->ListFolderName();

            //Condition si existe le nom du dossier sélectionné dans la bdd
            if(in_array($nomFolder, $namFolder->getFolders())){
                //si le nom du dossier existe, récupére l'id du nom du dossier
                $idFolder = new Folders();
                $idFolder->SearchIdFolder($nomFolder);
                $id_folder = $idFolder->getSearchidfolder()->Id;

                //récupération des sous-dossiers en fonction de l'id du dossier sélectionné pour la suppression.
                $sousdossier = new Subfolders();
                $sousdossier->SubFolders($id_folder);
                $RecupSousdossier = $sousdossier->getSubfolders() ;

                //test s'il y a des sous-dossiers
                if(empty($RecupSousdossier)){
                    //s'il n'y en a pas, récupération des documents en fonction de l'id du dossier sélectionné pour la suppression
                    $DocOfFolder = new Documents();
                    $DocOfFolder->ListDocumentsFolder($id_folder);

                    //test s'il y a des documents dans le dossier séléctionné pour la suppression
                    if(empty($DocOfFolder->getDocumentsFolder())){
                        //s'il n'y en a pas, alors suppression du dossier
                        $supprFolder = new Folders();
                        $supprFolder->DeleteFolder($id_folder);
                        $_SESSION['validation'] = 'La suppression du dossier est validée et exécutée ';
                        Redirect::redirectTo(URLBASE.'/Documents');
                        exit();
                    }else{
                        $_SESSION['info'] = 'Nous ne pouvons supprimer un dossier contenant des documents. Merci de gérer vos sous-dossiers et documents avant suppression.';
                        Redirect::redirectTo(URLBASE.'/Documents');
                        exit();
                    }
                }else{
                    $_SESSION['info'] = 'Nous ne pouvons supprimer un dossier contenant des sous-dossiers. Merci de gérer vos sous-dossiers et documents avant suppression.';
                    Redirect::redirectTo(URLBASE.'/Documents');
                    exit();
                }
            }else{
                $_SESSION['info'] = 'Merci d\'indiquer un nom de dossier existant';
                Redirect::redirectTo(URLBASE.'/Documents');
                exit();
            }
        }
            $this->RenderFormDeleteFolder();
    }


    private function RenderFormDeleteFolder(){
        $form = new Form();
        include_once FORM . '/FolderForm/DeleteFolder.php';
        $this->formDelete = $form->create();
    }

    /**
     * @return mixed
     */
    public function getFormDelete()
    {
        return $this->formDelete;
    }

}