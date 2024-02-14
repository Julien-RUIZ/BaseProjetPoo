<?php

namespace App\Controllers\Documents;

use App\Core\Form;
use App\Core\Redirect;
use App\Entity\Documents;
use App\Toolbox\UnusedNumber\SearchUnusedNumberColumn;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class AddDocumentController
{
    private $formAjoutdoc;
    public function addDocument($id, $idnum=Null){
        if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['text'])){
            $titredoc = htmlspecialchars($_POST['title']);
            $textdoc = htmlspecialchars($_POST['text']);
            $datecrea = htmlspecialchars($_POST['date']);
            $idfolder = $id[0];
            if(!isset($id[1])){ //$id[i] non déclaré et égale a Null
                $doc = new Documents();
                if($doc->setTitle($titredoc) === true){
                    $doc->ListDocumentsFolder($idfolder);
                    foreach ($doc->getDocumentsFolder() as $value){
                        $list[]= $value->TitreDoc;
                    }
                    if(!empty($list)){ // si la liste des noms de document en bdd n'est pas vide
                        if (!in_array($titredoc,$list )){ //si le nom n'est pas existant dans la liste en bdd
                            $numunused = new UnusedNumberColumn();
                            $numunused->UnusedNumberdoc($id); // récupération d'un num_doc unique et non utilisé
                            $doc->AddDocumentFolder($doc->getTitle(),$textdoc, $datecrea, $idfolder, $numunused->getValUnused()  );
                            $this->ValidationRedirectionFolder($idnum[0]);
                        }else{
                            $_SESSION['erreur'] = 'Le nom de titre est déjà utilisé dans ce dossier, merci d\'en écrire un unique.';
                            Redirect::redirectTo(URLBASE.'/Documents/'.$idnum[0].'/Ajout');
                            exit();
                        }
                    }else{ //si la liste des noms de document en bdd est vide alors on enregistre en bdd
                            $numunused = new UnusedNumberColumn();
                            $numunused->UnusedNumberdoc($id); // récupération d'un num_doc unique et non utilisé
                            $doc->AddDocumentFolder($doc->getTitle(),$textdoc, $datecrea, $idfolder, $numunused->getValUnused()   );
                            $this->ValidationRedirectionFolder($idnum[0]);
                    }
                }else{
                    $_SESSION['erreur'] = 'Le titre n\'est pas correct. Il peut comporter des lettres majuscules, minuscules avec espace ou tiret. ';
                    Redirect::redirectTo(URLBASE.'/Documents/'.$idnum[0].'/Ajout');
                    exit();
                }
            }else{ //$id[i] déclaré et différent de Null
                $idsubfolder = $id[1];
                $doc = new Documents();
                if($doc->setTitle($titredoc) === true){
                    $doc->ListDocumentsSubfolder($idfolder, $idsubfolder);
                    foreach ($doc->getDocuments() as $value){
                        $listsub[]= $value->TitreDoc;
                    }
                    if(!empty($list)){
                        if (!in_array($titredoc,$listsub)){
                            $numunused = new UnusedNumberColumn();
                            $numunused->UnusedNumberdoc($id);
                            $doc->AddDocumentSubFolder($doc->getTitle(),$textdoc, $datecrea, $idsubfolder, $numunused->getValUnused());
                            $this->ValidationRedirectionSubfolder($idnum[0],$idnum[1] );
                        }else{
                            $_SESSION['erreur'] = 'Le nom de titre est déjà utilisé dans ce dossier, merci d\'en écrire un unique.';
                            Redirect::redirectTo(URLBASE.'/Documents/'.$idnum[0].'/'.$idnum[1].'/Ajout');
                            exit();
                        }
                    }else{
                            $numunused = new UnusedNumberColumn();
                            $numunused->UnusedNumberdoc($id);
                            $doc->AddDocumentSubFolder($doc->getTitle(),$textdoc, $datecrea, $idsubfolder, $numunused->getValUnused());
                            $this->ValidationRedirectionSubfolder($idnum[0],$idnum[1] );
                    }
                }else{
                    $_SESSION['erreur'] = 'Le titre n\'est pas correct. Il peut comporter des lettres majuscules, minuscules avec espace ou tiret. ';
                    Redirect::redirectTo(URLBASE.'/Documents/'.$idnum[0].'/'.$idnum[1].'/Ajout');
                    exit();
                }
            }
        }
       $this->RenderFormAjoutDoc();
    }

    public function RenderFormAjoutDoc(){
        $form = new Form();
        include_once FORM.'/DocumentForm/AddDocument.php';
        $this->formAjoutdoc = $form->create();
    }

    public function ValidationRedirectionFolder($idfolder){
        $_SESSION['validation'] = 'Document enregistré avec succès';
        Redirect::redirectTo(URLBASE.'/Documents/'.$idfolder);
        exit();
    }
    public function ValidationRedirectionSubfolder($idfolder, $idsubfolder){
        $_SESSION['validation'] = 'Document enregistré avec succès';
        Redirect::redirectTo(URLBASE.'/Documents/'.$idfolder.'/'.$idsubfolder);
        exit();
    }

    /**
     * @return mixed
     */
    public function getFormAjoutdoc()
    {
        return $this->formAjoutdoc;
    }
}