<?php

namespace App\Controllers;

use App\Models\User;

class SearchController extends Controller{
    public $searchRequest;
    
    public function profil(){
        return $this->view('main.profil');
    }

    public function profilPost(){
        if($this->isNotSportsman()){
            if($this->isAdmin()){
                $searchRequest = (new User($this->getDB()))->findByCritere($_POST['critere-select'], htmlspecialchars($_POST['searchEntry'])); //Pour les administrateurs qui font une recherche
                return $searchRequest;
            }
            else{
                $searchRequest = (new User($this->getDB()))->findUserByCritere($_POST['critere-select'], htmlspecialchars($_POST['searchEntry'])); //Pour les coachs qui cherchent leurs utilisateurs
                return $searchRequest;
            }
        }
        return $this->profil();
    }
}