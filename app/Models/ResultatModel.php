<?php
    class ResultatModel{
        function result_requete($test, $pseudo){
            //================A virer lors de l'integration=================
            $conn = mysqli_connect('localhost', 'root', '', 'percutech');
            //==============================================================
            $sql = "SELECT ".$test.", DATE_FORMAT(date, '%d-%m %h:%i') FROM `test` JOIN adherents ON test.user_id = adherents.id WHERE pseudo LIKE '".$pseudo."'";
            $result = mysqli_query($conn, $sql);
            return $result;
        }

        function get_data($test, $result){
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