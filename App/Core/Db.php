<?php

namespace App\Core;

use App\Configuration\config;
use PDO;
use PDOException;

class Db extends PDO
{
    public static $instance;
    public static $db;

    /**
     * Initialization with connection to the database after singleton
     */
    private function __construct(){
        $dns = 'mysql:host='.config::HOST .';dbname='.config::DBNAME.';charset=utf8';
        try {
            self::$db = new PDO($dns, config::UTILISATEUR, config::PASSWORD );
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * Singleton pattern for instantiating the database once
     * @return static
     */
    public static function getInstance():self{
        if(self::$instance===null){
            self::$instance=new self();
        }
        return self::$instance;
    }
}

