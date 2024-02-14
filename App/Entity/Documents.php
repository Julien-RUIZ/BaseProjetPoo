<?php

namespace App\Entity;

use App\Models\DocumentsModel;

class Documents extends DocumentsModel
{
    protected $Title;
    protected $Text;
    protected $DateOfWriting;
    protected $ModifDate;
    protected $Users_id;
    protected $table;


    public function __construct(){
        $this->table = 'documents';
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title): bool
    {
        if(preg_match("/^[a-zA-ZÀ-ÿ\- ']+$/u", $Title)){
            $this->Title= $Title;
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->Text;
    }

    /**
     * @param mixed $Text
     */
    public function setText($Text): void
    {
        $this->Text = $Text;
    }

    /**
     * @return mixed
     */
    public function getDateOfWriting()
    {
        return $this->DateOfWriting;
    }

    /**
     * @param mixed $DateOfWriting
     */
    public function setDateOfWriting($DateOfWriting): void
    {
        $this->DateOfWriting = $DateOfWriting;
    }

    /**
     * @return mixed
     */
    public function getModifDate()
    {
        return $this->ModifDate;
    }

    /**
     * @param mixed $ModifDate
     */
    public function setModifDate($ModifDate): void
    {
        $this->ModifDate = $ModifDate;
    }

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->Users_id;
    }

    /**
     * @param mixed $Users_id
     */
    public function setUsersId($Users_id): void
    {
        $this->Users_id = $Users_id;
    }




}