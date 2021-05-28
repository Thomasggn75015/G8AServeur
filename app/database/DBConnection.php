<?php

namespace App\Database;

use PDO;

class DBConnection extends PDO {

    private $pdo;

    public function __construct(){
        $dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST;
        $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Voir les erreurs en exeptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //Utiliser des objets au lieu de tableau classique
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8' //pour éviter les erreurs d'encodage lors de la récupération des données
        ];
        $this->pdo = parent::__construct($dsn, DB_USERNAME, DB_PASSWORD, $options);
    }

    public function getPDO(): PDO{
            return $this->pdo ?? (new DBConnection());
    }
}