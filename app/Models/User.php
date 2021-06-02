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
        $coachname = $this->query("Select firstname FROM {$this->table} WHERE id = $user_id");
        $searchEntry = "$searchEntry%";
        return $this->query("SELECT id, user_role, firstname, lastname, coachname, pseudo, email, birthdate FROM {$this->table} WHERE $critereSelect LIKE ? AND user_role = 'sportif' AND coachname = '". $coachname[0]['firstname'] ."'", [$searchEntry]);
    }

    public function findUserByEntry($searchValue, $searchEntry){
        $result = $this->query("SELECT * FROM {$this->table} WHERE $searchValue = ?", [$searchEntry]);
    }

    public function postMailModif($modifProfil){
        $id = $_SESSION["user_id"];
        $this->query("UPDATE {$this->table} SET email = ? WHERE id=$id", [$modifProfil]);
        $_SESSION['user_mail'] = $modifProfil;
        setcookie('user_mail', $modifProfil, time() + 365*24*3600, null, null, false, true);
    }

    public function postMdpModif($modifProfil){
        $id = $_SESSION["user_id"];
        var_dump($modifProfil);
        $this->query("UPDATE {$this->table} SET mdp = ? WHERE id=$id", [$modifProfil]);
    }

    public function postPseudoModif($modifProfil){
        $id = $_SESSION["user_id"];
        $this->query("UPDATE {$this->table} SET pseudo = ? WHERE id=$id", [$modifProfil]);
        $_SESSION["user_pseudo"] = $modifProfil;
        setcookie('user_pseudo', $modifProfil, time() + 365*24*3600, null, null, false, true);
    }


    public function setInformationInscription($signinInfo){
        var_dump($signinInfo);
        return $this->query("INSERT INTO {$this->table} SET firstname = '".$signinInfo[0]."', lastname = '".$signinInfo[1]."', coachname = '".$signinInfo[2]."', pseudo = '".$signinInfo[3]."', mdp = '".$signinInfo[4]."', email = '".$signinInfo[5]."', birthdate = '".$signinInfo[6]."', user_role = '".$signinInfo[7]."'");
    }

    public function deleteUserByPseudo(){
        $pseudo = array_keys($_POST)[0];
        $this->query("DELETE FROM {$this->table} WHERE pseudo=?", [$pseudo]);
    }

    public function modifyUserByPseudo(){
        $infos = array_keys($_POST);
        return $infos;
        //$this->query("UPDATE {$this->table} SET user_role=?, firstname=?, lastname=?, coachname=?, pseudo=?, mdp=?, email=?, birthdate=?", [$infos]);
    }
    
    public function AddUser(){
        $this->query("INSERT INTO {$this->table} SET user_role= '".$infos."', firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."', coachname='".$_POST['coachname']."', pseudo='".$_POST['pseudo']."', mdp='root', email='".$_POST['email']."', birthdate='".$_POST['birthdate']."'");
    }
}
