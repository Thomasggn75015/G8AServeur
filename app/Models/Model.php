<?php

namespace App\Models;

use PDO;
use App\Database\DBConnection;

abstract class Model{

    protected $db;
    protected $table;

    /**
     * Pour que le modèle aie accès à la base de données
     */
    public function __construct(DBConnection $db){
        $this->db = $db;
    }

    /**
     * Fonction permettant de réaliser des requêtes SQL  sur les modèles de données
     * @param $param : paramètre de la requetes si on veut une requêtes SQL préparée
     * @param $single : true si on ne veut retourner qu'un seul élément
     */
    public function query(string $sql, array $param = null, bool $single = null){

        //On ne va faire une requête préparée que pour les requetes sql avec paramètres
        $method = is_null($param) ? 'query' : 'prepare';

        // Si c'est une requete en SELECT
        if(
            strpos($sql, "INSERT") === 0
            || strpos($sql, "UPDATE") === 0
            || strpos($sql, "DELETE") === 0)
        {
            $stmt = $this->db->getPDO()->$method($sql);
            
            $stmt->execute($param);
        }

        // fetchAll renvoie plusieurs lignes alors que fetch renvoie une seule ligne
        $fetch = is_null($single) ? 'fetchAll' : 'fetch' ;
        $stmt = $this->db->getPDO()->$method($sql);

        if($method == "query"){
            //Retourne le(s) résultat(s) de la requête sans paramètres
            return $stmt->$fetch();
        }else{
            //Retourne le(s) résultat(s) de la requête AVEC paramètres
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    
    }

   /* public function update(string $param = null){
        $pdo = $this->db->getPDO();
        $pdo->prepare("UPDATE Adherents SET pseudo='?' WHERE id=2);
        return $result->execute($param);
    }*/
    
    /**
     * Fonction permettant de retourner tous les tuples de la table du modèle courant
     */
    public function findAll() {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    /**
     * Fonction permettant de retourner le tuples de la table du modèle courant ayant l'id spécifié
     */
    public function findById(int $id) {
        $find = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true );
        return (gettype($find) == "boolean")? null : $find;
    }
}