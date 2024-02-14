<?php

namespace App\Models;

use App\Core\Db;
use PDO;

class DocumentsModel extends Db
{
    private $documents = [];
    private $documentsFolder = [];

    private $DocSub = [];

    private $DocFolder = [];

    private  $IdPrimDocSubfolder;
    private $IdPrimDocfolder;

    /**
     * 1/ Appel pour la création de l'instance de Db avec le Singleton
     * 2/ On retourne $db, l'instanciation de PDO
     * @return \PDO
     */
    public function initDb(){
        $requet = Db::getInstance();
        return self::$db;
    }
    public function ListDocumentsSubfolder($id0, $id1){
        $stmt = $this->initDb()->prepare(SQLDOCUMENTSSUBFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id0', $id0, PDO::PARAM_INT);
        $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
        $stmt->execute();
        $this->documents = $stmt->fetchAll();
    }

    public function ListDocumentsFolder($id){
        $stmt = $this->initDb()->prepare(SQLLISTEDOCFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->documentsFolder = $stmt->fetchAll();
    }

    public function documentSubfolder($id0, $id1, $id2){
        $stmt = $this->initDb()->prepare(SQLDOCUMENTSUBFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id0', $id0, PDO::PARAM_INT);
        $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
        $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
        $stmt->execute();
        $this->DocSub = $stmt->fetchAll();
    }

    public function SearchIddocSubfolderWithNum($idPrimFolder, $idPrimSubfolder, $numDocSubfolder){
        $stmt = $this->initDb()->prepare(SQLIDDOCSUBFOLDERWHITHNUM);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':idPrimFolder', $idPrimFolder, PDO::PARAM_INT);
        $stmt->bindParam(':idPrimSubfolder', $idPrimSubfolder, PDO::PARAM_INT);
        $stmt->bindParam(':numDocSubfolder', $numDocSubfolder, PDO::PARAM_INT);
        $stmt->execute();
        $this->IdPrimDocSubfolder = $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function SearchIddocfolderWithNum($idPrimFolder, $numDocfolder){
        $stmt = $this->initDb()->prepare(SQLIDDOCFOLDERWHITHNUM);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':idPrimFolder', $idPrimFolder, PDO::PARAM_INT);
        $stmt->bindParam(':numDocfolder', $numDocfolder, PDO::PARAM_INT);
        $stmt->execute();
        $this->IdPrimDocfolder = $stmt->fetch(PDO::FETCH_COLUMN);
    }
    public function documentFolder($id0, $id2){
        $stmt = $this->initDb()->prepare(SQLDOCUMENTFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id0', $id0, PDO::PARAM_INT);
        $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
        $stmt->execute();
        $this->DocFolder = $stmt->fetchAll();
    }
    public function AddDocumentFolder($title, $text, $date, $idFolder, $numdocfolder){
        $stmt= $this->initDb()->prepare(SQLADDDOCUMENTFOLDER);
        $stmt->bindParam(':idFolder', $idFolder, PDO::PARAM_INT);
        $stmt->bindParam(':numdocfolder', $numdocfolder, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function AddDocumentSubFolder($title, $text, $date, $idsubfolder, $numdocfolder){
        $stmt= $this->initDb()->prepare(SQLADDDOCUMENTSUBFOLDER);
        $stmt->bindParam(':idsubfolder', $idsubfolder, PDO::PARAM_INT);
        $stmt->bindParam(':numdocfolder', $numdocfolder, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function DeleteDocSubFolder($idsubfolder, $iddoc){
        $stmt= $this->initDb()->prepare(SQLDELETEDOCSUBFOLDER);
        $stmt->bindParam(':idsubfolder', $idsubfolder, PDO::PARAM_INT);
        $stmt->bindParam(':iddoc', $iddoc, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function DeleteDocFolder($idfolder, $iddoc){
        $stmt= $this->initDb()->prepare(SQLDELETEDOCFOLDER);
        $stmt->bindParam(':idfolder', $idfolder, PDO::PARAM_INT);
        $stmt->bindParam(':iddoc', $iddoc, PDO::PARAM_INT);
        $stmt->execute();
    }
    /**
     * @return array
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }
    /**
     * @return array
     */
    public function getDocumentsFolder(): array
    {
        return $this->documentsFolder;
    }

    /**
     * @return array
     */
    public function getDoc(): array
    {
        return $this->DocSub;
    }

    /**
     * @return array
     */
    public function getDocFolder(): array
    {
        return $this->DocFolder;
    }

    /**
     * @return mixed
     */
    public function getIdPrimDocSubfolder()
    {
        return $this->IdPrimDocSubfolder;
    }

    /**
     * @return mixed
     */
    public function getIdPrimDocfolder()
    {
        return $this->IdPrimDocfolder;
    }














}