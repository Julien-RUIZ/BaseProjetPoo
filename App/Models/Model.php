<?php

namespace App\Models;
use App\Core\Db;
use PDO;


class Model extends Db
{
    protected string $table;            //Table de la base de données
    //Private $db;//Instance de Db

    /**
     * 1/ Appel pour la création de l'instance de Db avec le Singleton
     * 2/ On retourne $db, l'instanciation de PDO
     * @return \PDO
     */
    private function initDb(){
        $requet = Db::getInstance();
        return self::$db;
    }
//************************************************************************************************
    /**
     * Recherche en fonction de la table retournée par la classe entité
     * @return void
     */
    public function FindAll(){
        $stmt = $this->initDb()->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();
        $stmtFinal = $stmt->fetchAll();
        return $stmtFinal;
//var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * 1/ Recherche en fonction de l'id et retour d'un array
     * 2/ bindvalue pour la protection des informations en entrées
     * @param $id
     * @return void
     */
    public function FindById($id){
        $stmt = $this->initDb()->prepare('SELECT * FROM '.$this->table.' WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmtFinal = $stmt->fetchAll();

        return $stmtFinal;
        //var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * 1/ Recherche en fonction du choix des colonnes
     * 2/ Pas de bindValue car nous sommes sur des noms de colonne et donc pas d'entrée d'utilisateur
     * @param array $tableauFind écrire de la forme:  $annonce->FindWith(['Titre', 'Description', 'Id']);
     * @return void
     */
    public function FindAllWith(array $tableauFind){
        $colonne = implode(" , ", $tableauFind);
        $stmt = $this->initDb()->prepare(' SELECT  '.$colonne.' FROM '.$this->table);
        $stmt->execute();
        $stmtFinal = $stmt->fetchAll();
        return $stmtFinal;
//var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * 1/ Recherche en fonction du choix des colonnes et de l'id
     * 2/ bindvalue pour la protection des informations en entrées
     * @param $id
     * @param array $tableauFind écrire de la forme : $annonce->FindWithById(id, ['Titre', 'Description']);
     * @return void
     */
    public function FindWithById($id, array $tableauFind ){
        $choix = implode(" , ", $tableauFind);

        $stmt = $this->initDb()->prepare(' SELECT ' . $choix . ' FROM '.$this->table.' WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmtFinal = $stmt->fetch();
        return $stmtFinal;
//var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * 1/ Recherche comme FindById($id) mais ici nous pouvons mettre plusieurs critères de recherche en utilisant les colonnes.
     * 2/ Utilisation de la fonction BindValue pour la protection de données depuis un array
     * @param array $tableauFind écrire de la forme : $annonce->FindByAnd(['Colonne '=>'valeur']);
     * @return void
     */
    public function FindByAnd(array $tableauFind){
            $condition = [];

        foreach ($tableauFind as $key => $value){
            $condition[] = $key .'= :'. $key;
        }
        $liste = implode(" AND ", $condition);

        $stmt = $this->initDb()->prepare('SELECT * FROM '.$this->table.' WHERE '.$liste);

        $this->BindValue($tableauFind, $stmt);

        $stmtFinal = $stmt->execute();

        $stmtFinal = $stmt->fetchAll();
        return $stmtFinal;
//var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * Pour la récupération d'un élément en fonction d'une variable.
     * @param $value valeur de type ['email'=> $_POST['email']]
     * @return mixed
     */
    public function FindBy($value){

        $stmt = $this->initDb()->prepare('SELECT * FROM '.$this->table.' WHERE Email = :value');
        $stmt->bindValue(':value', $value, PDO::PARAM_STR );
        $stmt->execute();
        $stmtFinal = $stmt->fetch();

        return $stmtFinal;
//var_dump($stmtFinal);
    }
//************************************************************************************************
    /**
     * 1/ Création de nouvelles données à partir d'un tableau.
     * 2/ Utilisation de la fonction BindValue pour la protection de données depuis un array
     * @param array $tableauCreate cela va s'écrire : $annonce->create(['Colonne'=>'Valeur ', 'Colonne'=>'Valeur', 'Colonne'=>'Valeur', etc...])
     * @return void
     */
    public function create( $tableauCreate){
        $champs = [];
        $param = [];
        foreach ($tableauCreate as $champ => $value){
            if($champ != 'table'){
                $champs[] = $champ;
                $param[] = ':'.$champ;
            }else{
                $table = $value;
            }
        }
        $liste_champs =implode(', ', $champs);
        $liste_valeurs =implode(', ', $param);
        $stmt = $this->initDb()->prepare('INSERT INTO '.$table.' ( '.$liste_champs.' ) VALUES ( '.$liste_valeurs.')');
        $this->BindValue($tableauCreate, $stmt);
        $final1 = $stmt->execute();
    }
//************************************************************************************************

    /**
     * 1/ Mise à jour de données en fonction de l'id et des colonnes à modifier.
     * 2/ Utilisation de la fonction BindValue pour la protection de données depuis un array
     * @param $id
     * @param array $tableauUpdate
     * @return void
     */
    Public function Update($id, $tableauUpdate ){
        $ChampValue = [] ;

        foreach ($tableauUpdate as $champ => $value){
            $ChampValue[] = $champ. '= :'.$champ ;
        }
        $listeModif = implode(', ', $ChampValue);

        $stmt = $this->initDb()->prepare('UPDATE '.$this->table.' SET '.$listeModif.' WHERE id = :id');
        $this->BindValue($tableauUpdate, $stmt);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $final1 = $stmt->execute();
//var_dump($final1);
    }
//************************************************************************************************

    /**
     * Supprimer une ligne de la bdd en fonction de l'id
     * @param int $id
     * @return void
     */
    public function Delete(int $id){
        $stmt = $this->initDb()->prepare('DELETE FROM ' .$this->table.' WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $final = $stmt->execute();
//var_dump($final);
    }
//************************************************************************************************

    /**
     * 1/La fonction BindValue va permettre de déterminer les paramétre en fonction des données
     * envoyées depuis un array
     * @param array $tableauAssoc
     * @param $stmtPrepare
     * @return void
     */
    public function BindValue( $tableauAssoc, $stmtPrepare){
        $refParam = ['string'=>PDO::PARAM_STR, 'integer'=>PDO::PARAM_INT,'boolean'=> PDO::PARAM_BOOL,'NULL'=>PDO::PARAM_NULL, 'LOB'=> PDO::PARAM_LOB ];
        foreach ($tableauAssoc as $key => $value) {
            if($key != 'table'){
                $testType = gettype($value);
                foreach ($refParam as $name => $param){
                    if ($testType == $name){
                        $paramName = ":" . $key;
                        $stmtPrepare->bindValue($paramName, $value, $param);
                    }
                }
            }
        }
    }
//************************************************************************************************
    /**
     * Redistribution de données d'un tableau en favorisant l'encapsulation.
     * @param array $donnees Tableau associatif des données
     * @return self Retourne l'objet hydraté
     */
    public function hydrate($donnees)
    {
        $errorRematching=[];
        foreach ($donnees as $key => $value){
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)){
                // On appelle le setter.
                if($this->$method($value) === false){
                    $errorRematching[]=$key;
                }
            }
        }
        return $errorRematching;
    }
}
