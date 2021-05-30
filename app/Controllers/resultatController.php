<?php

    namespace App\Controllers;
    
    class ResultatController{
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
            require("model/resultatModel.php");
            $resultatModel = new ResultatModel();
            $test = 'reaction_time';
            $data_lumina = $resultatModel->get_data($test, $resultatModel->result_requete($test, $pseudo));

            $test = 'rythm_memorization';
            $data_rythme = $resultatModel->get_data($test, $resultatModel->result_requete($test, $pseudo));

            $test = 'heart_rate';
            $data_frecar = $resultatModel->get_data($test, $resultatModel->result_requete($test, $pseudo));

            $test = 'temperature';
            $data_temper = $resultatModel->get_data($test, $resultatModel->result_requete($test, $pseudo));

            $test = 'sound_recognition';
            $data_recson = $resultatModel->get_data($test, $resultatModel->result_requete($test, $pseudo));
            require("view/resultatViewSportif.php");
        }

        function affichage_admin($pseudo){
            echo "admin";
        }





    }
    $resultats = new ResultatController();
    $resultats->role_base_display($role, $pseudo);
?>