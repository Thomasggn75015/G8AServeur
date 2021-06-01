<?php

    namespace App\Models;

    class ResultatModel extends Model{
        protected $table = 'test';

        public function getData($test, $id_user){
            $user_id = $_SESSION['user_id'];
            $sql_resultat = "SELECT ".$test.", DATE_FORMAT(date, '%d-%m %h:%i') FROM {$this->$table} JOIN adherents ON test.user_id = adherents.id WHERE id LIKE '".$id_user."'";
            $result = $this->query($sql_resultat);



            if($test == 'rythm_memorization'){
                $data_true = '';
                $data_false = '';
                $true = 0;
                $false = 0;
                while ($row = mysqli_fetch_array($result)) {
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
                while ($row = mysqli_fetch_array($result)) {
                    $data = $data . '"'. $row[$test].'",';
                    $date = $date . '"'. $row["DATE_FORMAT(date, '%d-%m %h:%i')"].'",';
                    $length_data++;
                }
            
                $data = trim($data,",");
                $date = trim($date,",");
                return array($data, $date);
            }
        }
        
    }

?>