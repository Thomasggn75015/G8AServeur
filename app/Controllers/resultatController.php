<?php

    namespace App\Controllers;
    
    use App\Models\ResultatModel;

    class ResultatController extends Controller{
        public function resultats(){
            return $this->view('main.profil');
        }
        
        public function affichage_sportif($id_user){
            $resultatModel = new ResultatModel();
            $test = 'reaction_time';
            $data_lumina = (new ResultatModel($this->getDB()))->get_data($test, $id_user));

            $test = 'rythm_memorization';
            $data_rythme = (new ResultatModel($this->getDB()))->get_data($test, $id_user));

            $test = 'heart_rate';
            $data_frecar = (new ResultatModel($this->getDB()))->get_data($test, $id_user));

            $test = 'temperature';
            $data_temper = (new ResultatModel($this->getDB()))->get_data($test, $id_user));

            $test = 'sound_recognition';
            $data_recson = (new ResultatModel($this->getDB()))->get_data($test, $id_user));
            $this->resultats();
        }
    }
?>