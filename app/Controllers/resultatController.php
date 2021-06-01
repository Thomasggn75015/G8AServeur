<?php

    namespace App\Controllers;

    use App\Models\ResultatModel;
    
    class ResultatController extends Controller{

        public function resultats($resultats){
            return $this->view('main.resultats_graphiques', $resultats);
        }
        
        public function affichage_sportif(){
            $id_user = $_SESSION["user_id"];
            $test = 'Reaction_time';
            $data_lumina = (new ResultatModel($this->getDB()))->getData($test, $id_user);

            $test = 'Rythm_memorization';
            $data_rythme = (new ResultatModel($this->getDB()))->getData($test, $id_user);

            $test = 'Heart_rate';
            $data_frecar = (new ResultatModel($this->getDB()))->getData($test, $id_user);

            $test = 'Temperature';
            $data_temper = (new ResultatModel($this->getDB()))->getData($test, $id_user);

            $test = 'Sound_recognition';
            $data_recson = (new ResultatModel($this->getDB()))->getData($test, $id_user);

            $resultats = [
                "data_lumina" => $data_lumina,
                "data_rythme" => $data_rythme,
                "data_frecar" => $data_frecar,
                "data_temper" => $data_temper,
                "data_recson" => $data_recson
            ];

            return $this->resultats($resultats);
        }
    }
?>