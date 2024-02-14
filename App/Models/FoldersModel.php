<?php

namespace App\Models;

use App\Core\Db;
use PDO;

class FoldersModel extends Db
{
    private $folders = [];

    private $searchidfolder;

    private $namefolder;

    private $Idfolder;

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
    public function Folders() {
        $stmt = $this->initDb()->prepare(  SQLFOLDER );
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->execute();
        $this->folders = $stmt->fetchAll();
    }

    public function addFolder($nomDossier, $numfolder){
        $stmt = $this->initDb()->prepare(  SQLADDFOLDER );
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':numfolder', $numfolder, PDO::PARAM_INT);
        $stmt->bindParam(':nomDossier', $nomDossier, PDO::PARAM_STR);
        $stmt->execute();
        $this->folders = $stmt->fetchAll();
    }

    public function ListFolderName(){
        $stmt = $this->initDb()->prepare(  SQLLISTEFOLDERNAME );
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->execute();
        $this->folders = $stmt->fetchAll(PDO::FETCH_COLUMN); // pour un affichage d'un tableau simple
    }

    public function SearchIdFolder($namFolder){
        $stmt = $this->initDb()->prepare(SQLIDFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':folder_name', $namFolder, PDO::PARAM_STR);
        $stmt->execute();
        $this->searchidfolder =  $stmt->fetch();
    }

    public function SearchIdFolderWithNum($idnumFolder){
        $stmt = $this->initDb()->prepare(SQLIDFOLDERWHITHNUM);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':idnumFolder', $idnumFolder, PDO::PARAM_INT);
        $stmt->execute();
        $this->Idfolder =  $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function DeleteFolder($id){
        $stmt = $this->initDb()->prepare(SQLDELETEFOLDER);
        $stmt->bindParam(':folder_id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function FolderNameForUpdate($id){
        $stmt = $this->initDb()->prepare(SQLNAMEFOLDERBYUPDATE);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':folder_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->namefolder =  $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function UpdateFolder($id, $newName){
        $stmt = $this->initDb()->prepare(SQLUPDATEFOLDER);
        $stmt->bindParam(':user_id', $_SESSION['Id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':UpdateName', $newName, PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * @return array
     */
    public function getFolders(): array
    {
        return $this->folders;
    }

    /**
     * @return mixed
     */
    public function getSearchidfolder()
    {
        return $this->searchidfolder;
    }

    /**
     * @return mixed
     */
    public function getNamefolder()
    {
        return $this->namefolder;
    }

    /**
     * @return mixed
     */
    public function getIdfolder()
    {
        return $this->Idfolder;
    }




}