<?php

namespace App\Models;

class User extends Model{
    protected $table = "Adherents";

    public function sortCritere($critereSelect){
        $selectChamps = array("id, user_role, firstname, lastname, coachname, pseudo, email, birthdate");
        unset($selectChamps["$critereSelect"]);
        return $selectChamps;
    }

    public function findByCritere($critereSelect, $searchEntry){
        $this->sortCritere($critereSelect);
        return $this->query("SELECT $critereSelect FROM {$this->table} WHERE $critereSelect= ?", [$critereSelect]);
    }

    public function findUserByCritere($critereSelect, $searchEntry){
        $this->sortCritere($critereSelect);
        return $this->query("SELECT $critereSelect FROM {$this->table} WHERE $criteSelect=? AND user_role = 'sportif'", [$searchEntry]);
    }
}