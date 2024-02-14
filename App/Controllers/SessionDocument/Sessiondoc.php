<?php

namespace App\Controllers\SessionDocument;

class Sessiondoc
{
    /**
     * Méthode qui va permettre de mettre en cache le contenu d'un document afin de l'afficher sur toutes les pages.
     * @param $Doc
     * @param $id_dossier
     * @param $id_sousdossier
     * @param $id_document
     * @return void
     */
    public function sessionDocPath($Doc,$id_dossier, $id_sousdossier, $id_document, $idnumfolder, $idnumSubfolder, $idnumdoc ){

            foreach ($Doc as $doc){
            $_SESSION['TitreDoc'] = $doc->TitreDoc;
            $_SESSION['TextDoc'] = $doc->TextDoc;
            $_SESSION['DateOfWriting'] = $doc->DateOfWriting;
            $_SESSION['ModifDate'] = $doc->ModifDate;
            }
        $_SESSION['id_dossier'] = $id_dossier;
        $_SESSION['id_sousdossier'] = $id_sousdossier;
        $_SESSION['id_document'] = $id_document;
        $_SESSION['idnumfolder'] = $idnumfolder;
        $_SESSION['idnumSubfolder'] = $idnumSubfolder;
        $_SESSION['idnumdoc'] = $idnumdoc;

    }
}