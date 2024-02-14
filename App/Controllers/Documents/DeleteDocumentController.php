<?php

namespace App\Controllers\Documents;

use App\Controllers\SessionDocument\ReadDocSession;
use App\Core\Redirect;
use App\Entity\Documents;

class DeleteDocumentController
{

    public function DeleteDocument($id){
        var_dump($_SESSION);

        $delete = new Documents();
        if($id[1]===0){
            $delete->DeleteDocFolder($id[0], $id[2]);
            $_SESSION['validation'] = 'Le document est supprimé !!';
            $_SESSION['id_document'] = Null;
            $_SESSION['idnumdoc'] = Null;
            Redirect::redirectTo(URLBASE.'/Documents/');
            exit();
        }elseif ($id[1]!=0){
            $delete->DeleteDocSubFolder($id[1], $id[2]);
            $_SESSION['validation'] = 'Le document est supprimé !!';
            $_SESSION['id_document'] = Null;
            $_SESSION['idnumdoc'] = Null;
            Redirect::redirectTo(URLBASE.'/Documents/');
            exit();
        }
    }




}