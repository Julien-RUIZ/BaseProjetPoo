<?php

namespace App\Toolbox\PrimaryId;

use App\Entity\Documents;
use App\Entity\Folders;
use App\Entity\Subfolders;

class PrimaryId
{
    private $PrimaryIdfolder;
    private $PrimIdSubfolder;
    private $PrimIdDocSubfolder;
    private $PrimIdDocfolder;
    private $TabPrimId;

    /**
     * @param $id
     * @return void
     * Dans chaque cas, utilisation des numéros passés en url pour récupérer l'id primaire
     * des tables Folder, subfolder et doc.
     */
    public function getprimaryId($id=Null){
        if(isset($id[0]) && !isset($id[1]) && !isset($id[2])){
            $this->SearchPrimaryIdFolder($id);
        }elseif(isset($id[0]) && isset($id[1]) && !isset($id[2])){
            $this->SearchPrimaryIdFolderSubfolder($id);
        }elseif(isset($id[0]) && isset($id[1]) && isset($id[2]) && $id[1]!=0){
            $this->SearchPrimaryIdDocSubfolder($id);
        }elseif(isset($id[0]) && isset($id[1]) && isset($id[2]) && $id[1]===0){
            $this->SearchIddocfolderWithNum($id);
        }
    }
    public function SearchPrimaryIdFolder($id){
        $folder = new Folders();
        $folder->SearchIdFolderWithNum($id[0]);
        $this->PrimaryIdfolder =  $folder->getIdfolder();
        $this->TabPrimId= [$this->PrimaryIdfolder];
    }
    public function SearchPrimaryIdFolderSubfolder($id){
        $this->SearchPrimaryIdFolder($id);
        $subfolder = new Subfolders();
        $subfolder->SearchIdSubFolderWithNum($this->PrimaryIdfolder, $id[1]);
        $this->PrimIdSubfolder = $subfolder->getIdPrimsubfolders();
        $this->TabPrimId= [$this->PrimaryIdfolder, $this->PrimIdSubfolder];
    }
    public function SearchPrimaryIdDocSubfolder($id){
        $this->SearchPrimaryIdFolderSubfolder($id);
        $docsubfolder = new Documents();
        $docsubfolder->SearchIddocSubfolderWithNum($this->PrimaryIdfolder, $this->PrimIdSubfolder , $id[2]);
        $this->PrimIdDocSubfolder = $docsubfolder->getIdPrimDocSubfolder();
        $this->TabPrimId= [$this->PrimaryIdfolder, $this->PrimIdSubfolder,$this->PrimIdDocSubfolder ];
    }
    public function SearchIddocfolderWithNum($id){
        $this->SearchPrimaryIdFolder($id);
        $docfolder = new Documents();
        $docfolder->SearchIddocfolderWithNum($this->PrimaryIdfolder, $id[2] );
        $this->PrimIdDocfolder = $docfolder->getIdPrimDocfolder();
        $this->TabPrimId= [$this->PrimaryIdfolder, 0,$this->PrimIdDocfolder ];
    }

    /**
     * @return mixed
     */
    public function getPrimaryIdfolder()
    {
        return $this->PrimaryIdfolder;
    }
    /**
     * @return mixed
     */
    public function getPrimIdSubfolder()
    {
        return $this->PrimIdSubfolder;
    }

    /**
     * @return mixed
     */
    public function getPrimIdDocSubfolder()
    {
        return $this->PrimIdDocSubfolder;
    }

    /**
     * @return mixed
     */
    public function getPrimIdDocfolder()
    {
        return $this->PrimIdDocfolder;
    }

    /**
     * @return mixed
     */
    public function getTabPrimId()
    {
        return $this->TabPrimId;
    }

}