<?php

namespace App\Controllers\Folders;

use App\Controllers\SessionDocument\ReadDocSession;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Folders;
use App\Toolbox\PrimaryId\PrimaryId;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class FoldersController
{
    /**
     * Méthode qui va retourner toutes les informations sur la page racine '/documents'.
     *
     * @return void
     */
    public function ListOffolders(){
        if(empty($_SESSION['Id'])){
            Redirect::redirectTo(URLBASE);
        }else{

            $sessionDoc = new ReadDocSession();
            $sessionDoc->getDocSession();
            
            $folder = new Folders();
            $folder->Folders();

            $ajoutFolder = new AddFolderController();
            $ajoutFolder->AddFolder();

            $deleteFolder = new DeleteFolderController();
            $deleteFolder->deleteFolder();

            if($sessionDoc->DocumentSession['TitreDoc'] === Null){
                Render::View('/Documents/Folder',
                    [
                        'folders'=>$folder->getFolders(),
                        'AjoutFolder'=>$ajoutFolder->getformeAjout(),
                        'deleteFolder'=>$deleteFolder->getFormDelete(),
                    ], 'DocumentPage');
            }else{
                Render::View('/Documents/Folder',
                    [ 'docsession'=>$sessionDoc->getDocumentSession(),
                        'folders'=>$folder->getFolders(),
                        'AjoutFolder'=>$ajoutFolder->getformeAjout(),
                        'deleteFolder'=>$deleteFolder->getFormDelete(),
                    ], 'DocumentPage');
            }
        }
    }
}

