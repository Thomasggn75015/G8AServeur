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
        /*if($modifProfil["pseudo"] == null){
            unset($modifProfil["pseudo"]);
        }
        if($modifProfil["mdp"] == null){
            unset($modifProfil["mdp"]);
        }
        if($modifProfil["mail"] == null){
            unset($modifProfil["mail"]);
        }*/
        //var_dump($modifProfil);
        $pseudo = $modifProfil["pseudo"];
        $mdp = $modifProfil["mdp"];
        $mail = $modifProfil["mail"];
        //var_dump($pseudo);
        //var_dump($mdp);
        //var_dump($mail);
        /*if($modifProfil["pseudo"] != null && $modifProfil["mdp"] != null && $modifProfil["mail"] != null){
            $this->query("UPDATE {$this->table} SET pseudo='?', mdp='?', email='?' WHERE id=?", [$modifProfil]);
        }*/
    }
    
    public function setInformationInscription($signinInfo){
        $sql_setInfoInsc = "INSERT INTO {$this->table} SET firstname = '".$signinInfo[0]."', lastname = '".$$signinInfo[1]."', coach = '".$$signinInfo[2]."', pseudo = '".$$signinInfo[3]."', mdp = '".md5($$signinInfo[4])."', email = '".$$signinInfo[5]."', bithdate = '".$$signinInfo[6]."', role_user = '".$$signinInfo[7]."'";
        return $this->query($sql_setInfoInsc);
    }
}