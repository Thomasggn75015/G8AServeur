<?php
    //Recup
    //$pseudo = $_POST("pseudo")
    $test = $_POST["test"];

    //Lien
    $conn = mysqli_connect('localhost', 'root', '', 'mydb');

    //Requete SQl
    //POUR EVITER LES ERREURS : ne pas oublier de rajouter les apostrophes de chaque côté de la variable entre dans le query
    $query = "SELECT resultat FROM resultat_test JOIN index_tests ON index_tests.id_test = resultat_test.id_test WHERE test LIKE '".$test."'";
    //echo $query;
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    $retour = "";

    //Fetch
    if($result->num_rows > 0){
        $number = 0;
        while($row = $result->fetch_assoc()){
            $retour .= implode($row)."<br>";
            $number ++;
            //echo "resultat :".implode($row)."<br>";
            //echo"<div id='show_result'>
            //        <h1 id='resultat'>resultat :</h1>".implode($row)."<br>
            //    </div>";
        }
    }else{$number = 0;}
    //Envoie au navigateur
    //echo $retour;
    
    echo"<div id='show_result'>
            <h1 id='resultat'>resultat :</h1>".$retour."<br>
            <p> Ce test a été réalisé ".$number." fois</p>
        </div>";

    //Libération
    $conn->close();
?>