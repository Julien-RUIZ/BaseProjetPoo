<?php

namespace App\Controllers\Documents;

use App\Controllers\SessionDocument\ReadDocSession;
use App\Core\Redirect;
use App\Core\Render;
use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;
use App\Toolbox\PrimaryId\PrimaryId;
use App\Toolbox\UnusedNumber\UnusedNumberColumn;

class DocumentsSubfolderController
{
    public function ListeOfDocumentsSubfolder($id){
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
            $subfolder->Subfolders($idPrim[0]);

            $docsubfolder = new Documents();
            $docsubfolder->ListDocumentsSubfolder($idPrim[0], $idPrim[1]);

            $id_dossier = $idPrim[0];
            $id_sousdossier = $idPrim[1];

            if($sessionDoc->DocumentSession['TitreDoc'] === Null){
            Render::View('/Documents/DocOfSubfolders',
                ['documentsroot'=>$docfolder->getDocumentsFolder(),
                    'id_dossier'=>$id_dossier,
                    'id_sousdossier'=>$id_sousdossier,
                    'folders'=>$folder->getFolders(),
                    'subfolders'=>$subfolder->getSubfolders(),
                    'documents'=>$docsubfolder->getDocuments(),
                ],
                'DocumentPage');
            }else{
                Render::View('/Documents/DocOfSubfolders',
                    ['documentsroot'=>$docfolder->getDocumentsFolder(),
                        'docsession'=>$sessionDoc->getDocumentSession(),
                        'id_dossier'=>$id_dossier,
                        'id_sousdossier'=>$id_sousdossier,
                        'folders'=>$folder->getFolders(),
                        'subfolders'=>$subfolder->getSubfolders(),
                        'documents'=>$docsubfolder->getDocuments(),
                    ],
                    'DocumentPage');
            }
        }
    }
}