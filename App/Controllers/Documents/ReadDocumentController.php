<?php

namespace App\Controllers\Documents;

use App\Controllers\Folders\UpdateFolderController;
use App\Controllers\SessionDocument\Sessiondoc;
use App\Controllers\SubFolders\AddSubfolderController;
use App\Controllers\SubFolders\DeleteSubfolderController;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;
use App\Toolbox\PrimaryId\PrimaryId;

class ReadDocumentController
{
    private $Doc = [];

    public function ChoiceOfDocument($id){
        if(empty($_SESSION['Id'])){
            Redirect::redirectTo(URLBASE);
        }else{

                $primary = new PrimaryId();
                $primary->getprimaryId($id);
                $idPrim = $primary->getTabPrimId();

            if($idPrim[1]===0){

                $folder= new Folders();
                $folder->Folders();

                $docfolder = new Documents();
                $docfolder->ListDocumentsFolder($idPrim[0]);

                $subfolder = new Subfolders();
                $subfolder->Subfolders($idPrim[0]);

                $updateFolder = new UpdateFolderController();
                $updateFolder->UpdateFolder($idPrim[0]);

                $addSubfolder = new AddSubfolderController();
                $addSubfolder->addsubfolder($idPrim[0]);

                $deleteSubfolder = new DeleteSubfolderController();
                $deleteSubfolder->DeleteSubfolder($idPrim[0]);

                $this->SeeDocument($idPrim[0], $idPrim[1], $idPrim[2]);
                $id_dossier = $idPrim[0];
                $id_sousdossier = $idPrim[1];
                $id_document = $idPrim[2];

                $sessiondoc = new Sessiondoc();
                $sessiondoc->sessionDocPath($this->Doc, $idPrim[0], $idPrim[1], $idPrim[2], $id[0], $id[1], $id[2] );

                Render::View('/Documents/SubfoldersAndDocs',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'id_dossier'=>$id_dossier,
                        'id_sousdossier'=>$id_sousdossier,
                        'id_document'=>$id_document,
                        'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'docs'=>$this->Doc,
                        'updateFolder'=>$updateFolder->getFormUpdate(),
                        'addsubfolder'=>$addSubfolder->getFomAdd(),
                        'deletesubfolder'=>$deleteSubfolder->getFormdeleteSub()
                    ],
                    'DocumentPage');
            }else{
                $primary = new PrimaryId();
                $primary->getprimaryId($id);
                $idPrim = $primary->getTabPrimId();

                $folder= new Folders();
                $folder->Folders();

                $docfolder = new Documents();
                $docfolder->ListDocumentsFolder($idPrim[0]);

                $subfolder = new Subfolders();
                $subfolder->Subfolders($idPrim[0]);

                $docsubfolder = new Documents();
                $docsubfolder->ListDocumentsSubfolder($idPrim[0], $idPrim[1]);

                $this->SeeDocument($idPrim[0], $idPrim[1], $idPrim[2]);
                $id_dossier = $idPrim[0];
                $id_sousdossier = $idPrim[1];
                $id_document = $idPrim[2];

                $sessiondoc = new Sessiondoc();
                $sessiondoc->sessionDocPath($this->Doc, $idPrim[0], $idPrim[1], $idPrim[2], $id[0], $id[1], $id[2] );

                Render::View('/Documents/DocOfSubfolders',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'id_dossier'=>$id_dossier,
                        'id_sousdossier'=>$id_sousdossier,
                        'id_document'=>$id_document,
                        'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'documents'=>$docsubfolder->getDocuments(),
                        'docs'=>$this->Doc,
                    ],
                    'DocumentPage');
            }
        }
    }

    /**
     * Méthode qui permet de sélectionner un document en fonction de la position dans l'arborescence
     * si $id0 = 0 le ou les documents se trouvent au niveau des dossiers
     * si $id1 = 0 le ou les documents se trouvent au niveau des sous-dossiers
     * @param $id0 / variable qui permet de déterminer le dossier
     * @param $id1 / variable qui permet de déterminer le sous-dossier
     * @param $id2 / variable qui permet de déterminer le document
     * @return void
     */
    public function SeeDocument($id0, $id1, $id2){
        if($id1 === 0 ){
            $documentFolder = new Documents();
            $documentFolder->documentFolder($id0, $id2);
            $this->Doc = $documentFolder->getDocFolder();
        }else{
            $documentsub = new Documents();
            $documentsub->documentSubfolder($id0, $id1, $id2);
            $this->Doc = $documentsub->getDoc();
        }
    }

    /**
     * @return array
     */
    public function getDoc(): array
    {
        return $this->Doc;
    }
}