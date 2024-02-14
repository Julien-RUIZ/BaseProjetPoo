<?php

namespace App\Controllers\SubFolders;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Documents;
use App\Entity\Subfolders;

class DeleteSubfolderController
{

    private $formdeleteSub;
    public function DeleteSubfolder($id, $idnum=Null){
        if(isset($_POST['delete'])){
            $deletesub = htmlspecialchars($_POST['delete']);
            $sub = new Subfolders();
            $regexdeletesub = $sub->setTitre($deletesub);
            if($regexdeletesub===true){
                //Comparer le nom entré dans le formulaire avec la bdd
                $sub->IdSubfolderByname($id, $sub->getTitre());
                $idSubfolder = $sub->getIdsubfolder()->Id;
                var_dump($idSubfolder);
                if($idSubfolder!= false){
                    //vérification s'il y a des documents dans le sous dossier.
                    $docs= new Documents();
                    $docs->ListDocumentsSubfolder($id, $idSubfolder);

                    if(empty($docs->getDocuments())){
                        //s'il n'y a pas de documents dans le sous-dossier, alors appel de la méthode de suppression
                        $sub->DeleteSubfolder($idSubfolder);
                        $_SESSION['validation'] = 'suppression ok';
                        Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                        exit();
                    }else{
                        $_SESSION['info'] = 'Nous ne pouvons supprimer un dossier contenant des documents. Merci de les gérer avant suppression.';
                        Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                        exit();
                    }
                }else{
                    $_SESSION['erreur'] = 'Merci d\'indiquer un nom de sous-dossier existant.';
                    Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                    exit();
                }
            }else{
                $_SESSION['erreur'] = 'Merci de respecter la structure du nom du dossier. Maximum 20 caractères alphanumérique, avec ou sans espace et sans caractères spéciaux.';
                Redirect::redirectTo(URLBASE.'/Documents/'.$idnum);
                exit();
            }
        }

        $this->RenderFormDeleteSubfolder($id);
    }
    private function RenderFormDeleteSubfolder($id){
        $form =new Form();
        include_once FORM.'/SubfolderForm/DeleteSubfolder.php';
        $this->formdeleteSub = $form->create();
    }

    /**
     * @return mixed
     */
    public function getFormdeleteSub()
    {
        return $this->formdeleteSub;
    }


}