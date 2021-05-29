<?php
    class ResultatController extends Controller{
        function role_base_display($role, $pseudo){
            if($role == "COACH"){
                $this->affichage_coach($pseudo);
            }elseif($role == "SPORTIF"){
                $this->affichage_sportif($pseudo);
            }elseif($role == "ADMIN"){
                $this->affichage_admin($pseudo);
            }
        }

        function affichage_coach($pseudo){
            echo "coach";
        }

        function affichage_sportif($pseudo){
            require("view/resultatViewSportif.php");
            //echo "sportif";
        }

        function affichage_admin($pseudo){
            echo "admin";
        }



    }
    $resultats = new ResultatController();
    $resultats->role_base_display($role, $pseudo);
?>