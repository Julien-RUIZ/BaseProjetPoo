<?php

namespace App\Controllers\SubFolders;

use App\Controllers\Folders\UpdateFolderController;
use App\Controllers\SessionDocument\ReadDocSession;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;
use App\Toolbox\PrimaryId\PrimaryId;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class SubFoldersController
{
    public function ListOfSubfolders($id){
        if(empty($_SESSION['Id'])){
            Redirect::redirectTo(URLBASE);
        }else{
            $primary = new PrimaryId();
            $primary->getprimaryId($id);
            $idPrim = $primary->getTabPrimId();

            $sessionDoc = new ReadDocSession();
            $sessionDoc->getDocSession();

            $folder= new Folders();
            $folder->Folders();

            $docfolder = new Documents();
            $docfolder->ListDocumentsFolder($idPrim[0]);

            $subfolder = new Subfolders();
            $subfolder->subfolders($idPrim[0]);

            $updateFolder = new UpdateFolderController();
            $updateFolder->UpdateFolder($idPrim[0], $id[0]);

            $addSubfolder = new AddSubfolderController();
            $addSubfolder->addsubfolder($idPrim, $id[0]);

            $deleteSubfolder = new DeleteSubfolderController();
            $deleteSubfolder->DeleteSubfolder($idPrim[0], $id[0]);

            $id_dossier = $idPrim[0];

            if($sessionDoc->DocumentSession['TitreDoc'] === Null){
                Render::View('/Documents/SubfoldersAndDocs',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'id_dossier'=>$id_dossier,'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'updateFolder'=>$updateFolder->getFormUpdate(),
                        'addsubfolder'=>$addSubfolder->getFomAdd(),
                        'deletesubfolder'=>$deleteSubfolder->getFormdeleteSub()
                    ], 'DocumentPage');
            }else{
                Render::View('/Documents/SubfoldersAndDocs',
                    [
                        'documentsroot'=>$docfolder->getDocumentsFolder(),
                        'docsession'=>$sessionDoc->getDocumentSession(),
                        'id_dossier'=>$id_dossier,'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'updateFolder'=>$updateFolder->getFormUpdate(),
                        'addsubfolder'=>$addSubfolder->getFomAdd(),
                        'deletesubfolder'=>$deleteSubfolder->getFormdeleteSub()
                    ], 'DocumentPage');
            }
        }
    }
}

