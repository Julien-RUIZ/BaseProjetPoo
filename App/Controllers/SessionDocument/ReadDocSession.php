<?php
namespace App\Controllers\SessionDocument;
class ReadDocSession
{
    public $DocumentSession = [];

    public function getDocSession(){
        $this->DocumentSession = [
            'TitreDoc'       => isset($_SESSION['TitreDoc']) ? $_SESSION['TitreDoc'] : null,
            'TextDoc'        => isset($_SESSION['TextDoc']) ? $_SESSION['TextDoc'] : null,
            'DateOfWriting'  => isset($_SESSION['DateOfWriting']) ? $_SESSION['DateOfWriting'] : null,
            'ModifDate'      => isset($_SESSION['ModifDate']) ? $_SESSION['ModifDate'] : null,
            'id_dossier'     => isset($_SESSION['id_dossier']) ? $_SESSION['id_dossier'] : null,
            'id_sousdossier' => isset($_SESSION['id_sousdossier']) ? $_SESSION['id_sousdossier'] : null,
            'id_document'    => isset($_SESSION['id_document']) ? $_SESSION['id_document'] : null,
            'idnumfolder'    => isset($_SESSION['idnumfolder']) ? $_SESSION['idnumfolder'] : null,
            'idnumSubfolder' => isset($_SESSION['idnumSubfolder']) ? $_SESSION['idnumSubfolder'] : null,
            'idnumdoc'       => isset($_SESSION['idnumdoc']) ? $_SESSION['idnumdoc'] : null
        ];
    }

    /**
     * @return array
     */
    public function getDocumentSession(): array
    {
        return $this->DocumentSession;
    }
}
