<?php

namespace App\Controllers;

use App\Models\User;

class SearchController extends Controller{
    public $searchRequest;
    public $modifMail = null;
    public $modifMdp = null;
    public $modifPseudo = null;
    public $detection_erreur_enregistrement = 0;
    public $detail_erreur_enregistrement = null;

    public function profil(array $params = null){
        return $this->view('main.profil', $params);
    }

    public function profilPost(){
        if($this->isNotSportsman()){
            if($this->isAdmin()){
                $searchRequest = (new User($this->getDB()))->findByCritere($_POST['critereSelect'], htmlspecialchars($_POST['searchEntry'])); //Pour les administrateurs qui font une recherche
            }
            else{
                $searchRequest = (new User($this->getDB()))->findUserByCritere($_POST['critereSelect'], htmlspecialchars($_POST['searchEntry'])); //Pour les coachs qui cherchent leurs utilisateurs
            }
        }
        return $this->profil($searchRequest);
    }

    public function validerModifProfil(){
        if(isset($_POST['pseudo']) || isset($_POST['mdp']) || isset($_POST['email'])){
            if(isset($_POST['pseudo'])){
                $this->modifPseudo = htmlspecialchars($_POST['pseudo']);
                if(!preg_match("#^[a-zA-Z0-9]+$#",$this->modifPseudo)){
                    $detail_erreur_enregistrement = "Votre nom d'utilisateur doit être en caractère alphanumérique";
                    $this->detection_erreur_enregistrement = 1;
                }
                elseif(((new User($this->getDB()))->findUserByEntry('pseudo', $this->modifPseudo) != null)){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                $this->detection_erreur_enregistrement = 1;
                $this->detail_erreur_enregistrement = "Ce pseudo est déjà utilisé";
                }
            }

            else if(isset($_POST['mdp']) && !preg_match("#^[a-zA-Z0-9]+$#", htmlspecialchars($_POST['mdp']))){
                $this->modifMdp = htmlspecialchars($_POST['mdp']);
                    $this->detection_erreur_enregistrement = 1;
                    $this->detail_erreur_enregistrement = "Le format du mot de passe n'est pas valable";
            }

            else if(isset($_POST['email'])){//on vérifie que cet email n'est pas déjà utilisé par un autre membre
                $this->modifMail = htmlspecialchars($_POST['email']);
                if((new User($this->getDB()))->findUserByEntry('email', $this->modifMail) != null){
                $this->detection_erreur_enregistrement = 1;
                $this->detail_erreur_enregistrement = "Cette adresse e-mail est déjà utilisée";
                }
            }
        
            if($this->detection_erreur_enregistrement == 1){
                return $this->profil($this->detail_erreur_enregistrement);
            }

            else{
                $modifProfil = array("pseudo" => $this->modifPseudo, "mdp" => $this->modifMdp, "mail" => $this->modifMail, "id" => $_SESSION["user_id"]);
                if($modifProfil["mdp"] != null){
                    (new User($this->getDB()))->postMdpModif($modifProfil["mdp"]);
                }

                if($modifProfil["pseudo"] != null){
                    (new User($this->getDB()))->postPseudoModif($modifProfil["pseudo"]);
                }

                if($modifProfil["mail"] != null){
                    (new User($this->getDB()))->postMailModif($modifProfil["mail"]);
                }
                (new User($this->getDB()))->postModifProfil();
                $succes = array("Informations modifiées avec succès");
                return $this->profil($succes);
            }
        }
        else{
            return $this->profil();
        }
    }
}