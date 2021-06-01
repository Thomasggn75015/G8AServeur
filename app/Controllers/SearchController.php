<?php

namespace App\Controllers;

use App\Models\User;

class SearchController extends Controller{
    public $searchRequest;

    public function profil(){
        return $this->view('main.profil');
    }

    public function profilPost(){ //La variable $_POST est bonne mais la requête fonctionne pas
        if($this->isNotSportsman()){
            if($this->isAdmin()){
                $searchRequest = (new User($this->getDB()))->findByCritere($_POST['critereSelect'], htmlspecialchars($_POST['searchEntry'])); //Pour les administrateurs qui font une recherche
                //return $searchRequest; //Ça récupère rien 
            }
            else{
                $searchRequest = (new User($this->getDB()))->findUserByCritere($_POST['critereSelect'], htmlspecialchars($_POST['searchEntry'])); //Pour les coachs qui cherchent leurs utilisateurs
                //return $searchRequest; //Ça récupère rien 
            }
        }
        var_dump($searchRequest);
        return $this->profil();
    }
}