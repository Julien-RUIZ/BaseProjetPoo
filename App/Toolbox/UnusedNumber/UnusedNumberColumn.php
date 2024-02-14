<?php

namespace App\Toolbox\UnusedNumber;

use App\Core\Db;
use PDO;

class UnusedNumberColumn
{

    private $Liste=[];

    private $valUnused;

    /**
     * 1/ Appel pour la création de l'instance de Db avec le Singleton
     * 2/ On retourne $db, l'instanciation de PDO
     * @return \PDO
     */
    public function initDb(){
        Db::getInstance();
        return Db::$db;
    }
    // faire requet pour le subfolder et pour document

    /**
     * @param $id
     * @return void
     * Méthode qui va permettre de déterminer un num_folder ou un num_subfolder de libre
     */
    public function UnusedNumber($id=Null){
        $this->getBddColumn($id);
        $search = new SearchUnusedNumberColumn();
        $search->SearchUnusedNumber($this->Liste);
        $this->valUnused = $search->getUnusedN();
    }

    /**
     * @param $id
     * @return void
     * Méthode qui va permettre de déterminer un num_doc du folder ou du subfolder de libre
     */
    public function UnusedNumberdoc($id=Null){
        $this->getBddColumnDoc($id);
        $search = new SearchUnusedNumberColumn();
        $search->SearchUnusedNumber($this->Liste);
        $this->valUnused = $search->getUnusedN();
    }

    /**
     * @param $id
     * @return void
     * Les deux méthodes suivantes permettent la récupération de la liste des num_folder, num_subfolder,
     * num_doc du folder ou du num_doc du sub_folder
     */
    public function getBddColumn($id){
        if(!isset($id[0]) && !isset($id[1])){ // $id[0] et $id[1] =Null => à utiliser dans $ajoutFolder->AddFolder() du controller FolderController
            //récupère la liste des nombres se trouvant dans la colonne num_folder
            $stmt = $this->initDb()->prepare(SQL_SEARCH_UNUSED_NUMBER_FOLDER);
        }elseif(isset($id[0]) && !isset($id[1])){ // $id[0]= ok et $id[1] =Null => à utiliser dans $addSubfolder->addsubfolder($id[0]); du controller SubFolderController
            //récupère la liste des nombres se trouvant dans la colonne num_subfolder
            $stmt = $this->initDb()->prepare(SQL_SEARCH_UNUSED_NUMBER_SUBFOLDER);
            $stmt->bindParam(':id0', $id[0], PDO::PARAM_INT);
        }
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->execute();
        $this->Liste = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function getBddColumnDoc($id){
        if(isset($id[0]) && isset($id[1])){ // $id[0] et $id[1] = ok => à utiliser dans $addDocument->addDocument($id) du controller PageAddDocumentController
            //récupère la liste des nombres se trouvant dans la colonne num_document en fonction de folder et subfolder
            $stmt = $this->initDb()->prepare(SQL_SEARCH_UNUSED_NUMBER_DOCSUBFOLDER);
            $stmt->bindParam(':id0', $id[0], PDO::PARAM_INT);
            $stmt->bindParam(':id1', $id[1], PDO::PARAM_INT);
        }elseif(isset($id[0]) && !isset($id[1])){ // $id[0]= ok et $id[1] =Null => à utiliser dans $addDocument->addDocument($id) du controller PageAddDocumentController
            $stmt = $this->initDb()->prepare(SQL_SEARCH_UNUSED_NUMBER_DOCFOLDER);
            $stmt->bindParam(':id0', $id[0], PDO::PARAM_INT);
        }
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->execute();
        $this->Liste = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * @return array
     */
    public function getListe(): array
    {
        return $this->Liste;
    }

    /**
     * @return mixed
     */
    public function getValUnused()
    {
        return $this->valUnused;
    }
}