<?php

namespace AppEN\Lib;

use PDO;
use PDOException;
use Exception;

class Connection{

    private $conectando;

    private function __construct(){}
    public static function getConnection()
    {   
        // return $pdo = new PDO("mysql:host=localhost;dbname=meusitepro", "root", "");
    
        $pdoConfig = DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME;
        return $pdo = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
    }
        
} 














?>