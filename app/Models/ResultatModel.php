<?php

    namespace App\Models;

    class ResultatModel extends Model{
        protected $table = "Test";

        public function getData($test, $id_user){
            $user_id = $_SESSION['user_id'];
            $sql_resultat = "SELECT $test, date FROM {$this->table} WHERE user_id=$id_user";
            $result = $this->query($sql_resultat);


            if($test == 'Rythm_memorization'){
                $data_true = '';
                $data_false = '';
                $true = 0;
                $false = 0;
                foreach($result as $row) {
                    if($row[$test] == 'oui'){
                        $true++;
                    }else{
                        $false++;
                    }
                }
                $data_true = $true;
                $data_false = $false;

                return array($data_true, $data_false);
            }else{
                $data = '';
                $date = '';
                $length_data = 0;
                foreach($result as $row) {
                    $data = $data . '"'. $row[$test].'",';
                    $date = $date . '"'. $row["date"].'",';
                    $length_data++;
                }
            
                $data = trim($data,",");
                $date = trim($date,",");
                return array($data, $date);
            }
        }
        
    }

?>