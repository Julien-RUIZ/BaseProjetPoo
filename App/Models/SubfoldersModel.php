<?php

namespace App\Models;
use App\Core\Db;
use PDO;

class SubfoldersModel extends Db
{
    private $subfolders = [];

    private $listeSubfoldersName=[];
    private $idsubfolder;

    private $IdPrimsubfolders;
    protected $Table;

    /**
     * 1/ Appel pour la création de l'instance de Db avec le Singleton
     * 2/ On retourne $db, l'instanciation de PDO
     * @return \PDO
     */
    public function initDb(){
        $requet = Db::getInstance();
        return self::$db;
    }
    public function SubFolders($id){
        $stmt = $this->initDb()->prepare(SQLSUBFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->subfolders = $stmt->fetchAll();
    }

    public function SearchIdSubFolderWithNum($PrimaryIdfolder, $numSubFolder){
        $stmt = $this->initDb()->prepare(SQLIDSUBFOLDERWHITHNUM);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':PrimaryIdfolder', $PrimaryIdfolder, PDO::PARAM_INT);
        $stmt->bindParam(':numSubFolder', $numSubFolder, PDO::PARAM_INT);
        $stmt->execute();
        $this->IdPrimsubfolders = $stmt->fetch(PDO::FETCH_COLUMN);
    }
    public function addSubfolder($id, $nameSubfolder, $numunused){
        $stmt=$this->initDb()->prepare(SQLADDSUBFOLDER);
        $stmt->bindParam(':subfolderName', $nameSubfolder, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':numunused', $numunused, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function IdSubfolderByname($id, $namesubfolder){
        $stmt = $this->initDb()->prepare(SQLIDNAMESUBFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':namesub', $namesubfolder, PDO::PARAM_STR);
        $stmt->execute();
        $this->idsubfolder = $stmt->fetch();
    }
    public function DeleteSubfolder($id){
        $stmt=$this->initDb()->prepare(SQLDELETESUBFOLDER);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function ListeSubfolder($id){
        $stmt = $this->initDb()->prepare(SQLLISTENAMESUBFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->listeSubfoldersName = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * @return array
     */
    public function getSubfolders(): array
    {
        return $this->subfolders;
    }

    /**
     * @return mixed
     */
    public function getIdsubfolder()
    {
        return $this->idsubfolder;
    }

    /**
     * @return array
     */
    public function getListeSubfoldersName(): array
    {
        return $this->listeSubfoldersName;
    }

    /**
     * @return mixed
     */
    public function getIdPrimsubfolders()
    {
        return $this->IdPrimsubfolders;
    }


}