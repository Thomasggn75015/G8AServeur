<?php

namespace App\Models;

class User extends Model{
    protected $table = "Adherents";


    public function findByCritere($critereSelect, $searchEntry){
        $searchEntry = "$searchEntry%";
        return $this->query("SELECT id, user_role, firstname, lastname, coachname, pseudo, email, birthdate FROM {$this->table} WHERE $critereSelect LIKE ?", [$searchEntry]);
    }

    public function findUserByCritere($critereSelect, $searchEntry){
        $user_id = $_SESSION['user_id'];
        $coachname = $this->query("Select firstname FROM {$this->table} WHERE user_id = $user_id");
        $searchEntry = "$searchEntry%";
        return $this->query("SELECT id, user_role, firstname, lastname, coachname, pseudo, email, birthdate FROM {$this->table} WHERE $critereSelect LIKE ? AND user_role = 'sportif' AND coachname = '$coachname'", [$searchEntry]);
    }

    public function findUserByEntry($searchValue, $searchEntry){
        $result = $this->query("SELECT * FROM {$this->table} WHERE $searchValue = ?", [$searchEntry]);
    }

    public function postModifProfil($modifProfil){
        if($modifProfil["pseudo"] == null){
            unset($modifProfil["pseudo"]);
        }
        if($modifProfil["mdp"] == null){
            unset($modifProfil["mdp"]);
        }
        if($modifProfil["mail"] == null){
            unset($modifProfil["mail"]);
        }

        var_dump($modifProfil);
        $modifKeys = array_keys($modifProfil);
        $modifValues = array_values($modifProfil);
    }
}