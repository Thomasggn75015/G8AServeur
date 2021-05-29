<?php
    //class InscriptionModel extends Model{
    class InscriptionModel{
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "mydb";

        //public $conn = dbConnect();
        //public $tableAdh = tableCreateVerif();

        function dbConnect(){
            try{
                //$conn_try = mysqli_connect($servername, $username, $password, $dbname);
                $conn_try = mysqli_connect('localhost', 'root', '', 'mydb');
            }catch(Exception $e){
                die("Connection failed: " . mysqli_connect_error());
            }
            return $conn_try;
        }


        function tableCreateVerif(){
            try{
                $addTable = "CREATE Table IF NOT EXISTS Adherents(
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(30) NOT NULL,
                    lastname VARCHAR(30) NOT NULL,
                    coach VARCHAR(30) NOT NULL,
                    pseudo VARCHAR(30) NOT NULL,
                    mdp VARCHAR(255) NOT NULL,
                    email VARCHAR(50),
                    bithdate VARCHAR(20) NOT NULL,
                    role_user VARCHAR(20) NOT NULL
                    )";
                return $addTable;
            }catch(Exception $e){
                echo "Error creating table: ".mysqli_error($conn);
            }
        }

        function setInformationInscription($conn, $sql_fname, $sql_lname, $sql_coach, $sql_pseudo, $sql_mdp, $sql_email, $sql_birthdate, $sql_role_user){
            $sql = "INSERT INTO Adherents SET firstname = '".$sql_fname."', lastname = '".$sql_lname."', coach = '".$sql_coach."', pseudo = '".$sql_pseudo."', mdp = '".md5($sql_mdp)."', email = '".$sql_email."', bithdate = '".$sql_birthdate."', role_user = '".$sql_role_user."'";
            if(!mysqli_query($conn, $sql)){
                echo "<h4 class = 'erreur'>Une erreur s'est produite: </h4>".mysqli_error($conn);
            }
            else{
                echo 'Felicitation pour votre adhésion !';
                //header('Location: page_vérification.php');
            }
        }
    }

    $modelInscription = new InscriptionModel();
    $conn = $modelInscription->dbConnect();
    $tableAdh = $modelInscription->tableCreateVerif();
?>