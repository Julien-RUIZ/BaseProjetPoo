<?php

namespace App\Controllers\Documents;

use App\Controllers\Folders\UpdateFolderController;
use App\Controllers\SessionDocument\ReadDocSession;
use App\Controllers\SubFolders\AddSubfolderController;
use App\Controllers\SubFolders\DeleteSubfolderController;
use App\Core\Form;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;
use App\Toolbox\PrimaryId\PrimaryId;

class PageAddDocumentController
{
    public function PageAddDocument($id){
        if(empty($_SESSION['Id'])){
            Redirect::redirectTo(URLBASE);
        }else{
            $primary = new PrimaryId();
            $primary->getprimaryId($id);
            $idPrim = $primary->getTabPrimId();

            $folder= new Folders();
            $folder->Folders();

            $docfolder = new Documents();
            $docfolder->ListDocumentsFolder($idPrim[0]);

            $subfolder = new Subfolders();
            $subfolder->subfolders($idPrim[0]);

            $addDocument = new AddDocumentController();
            $addDocument->addDocument($idPrim, $id);

            $id_dossier = $idPrim[0];
            if(isset($idPrim[1])){
                $docsubfolder = new Documents();
                $docsubfolder->ListDocumentsSubfolder($idPrim[0], $idPrim[1]);
                $id_sousdossier = $idPrim[1];
                Render::View('/Documents/AddDocumentSubfolder',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'id_dossier'=>$id_dossier,
                        'id_sousdossier'=>$id_sousdossier,
                        'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'documents'=>$docsubfolder->getDocuments(),
                        'formAddDoc'=>$addDocument->getFormAjoutdoc()
                    ], 'AddDocumentPage');
            }else{
                Render::View('/Documents/AddDocumentFolder',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'id_dossier'=>$id_dossier,'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'formAddDoc'=>$addDocument->getFormAjoutdoc()
                    ], 'AddDocumentPage');
            }
        }
    }
}