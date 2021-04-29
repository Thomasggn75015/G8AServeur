<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_enregistrement_sportif.css" />
    </head>

    <header>
        <?php include("menu_nav.php");?>
    </header>

    <body>
        

        <h1 class = 'inscription_titre'><B>Infinite Mesure</B></h1>

        <?php
            $servername = "localhost";
            $username = "Percutech";
            $password = "Boxe_BDD_G8A";
            $dbname = "percutech";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $tableUne = "CREATE Table IF NOT EXISTS Adherents(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastename VARCHAR(30) NOT NULL,
                coach VARCHAR(30) NOT NULL,
                pseudo VARCHAR(30) NOT NULL,
                mdp VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                bithdate VARCHAR(20) NOT NULL
                )";

            //Vérification de la connexion avec la table des adhérents
            
            if(!mysqli_query($conn, $tableUne)){
                echo "Error creating table: ".mysqli_error($conn);
            }
        ?>
        
        <?php
            $AfficherFormulaire = 1;
            
        if($AfficherFormulaire == 1){
            //Données en INPUT renseignées par le nouvel adhérents et correspondants aux critères de la table des adhérents.
        ?>

            <div class = "enregistrement_formulaire">
                <h1 class = "enregistrement"><B class = 'titreEnGras'>Créer un compte</B>(sportif)</h1>
                <form class = 'form' ACTION = "page_enregistrement_sportif.php" METHOD = "POST">
                    <label for = 'prenom'>Votre prénom</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'prenom', name = 'prenom' placeholder = 'Prénom' required minlength="2"></br>                                            <!--PRENOM-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'nom'>Votre nom</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'nom', name = 'nom' placeholder = 'NOM' required minlength="2"></br>                                                     <!--NOM-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'coach'>Nom de votre coach</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'coach', name = 'coach' placeholder = 'COACH' required minlength = "2"></br>                                         <!--NOM DU COACH-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'pseudo'>Votre pseudo</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'pseudo', name = 'pseudo' placeholder = "pseudo" required minlength="2"></br>                                            <!--PSEUDO-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'email'>E-mail</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'EMAIL', id = 'email', name = 'email' placeholder = "e-mail" required minlength="2"></br>                                             <!--E-MAIL-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'pswd'>Votre mot de passe</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'pswd', name = 'pswd' placeholder = "Au moins 6 caractères" required minlength="8" maxlength="50"></br>                                 <!--MOT DE PASSE-->
                    <p class = 'interligneValider_enregistrement'></p>
                    <label for = 'datedenaissance'>Votre date de naissance</label></br>
                    <INPUT class = "input_enregistrement" TYPE = 'NAME', id = 'datedenaissance', name = 'datedenaissance' placeholder = "jj/mm/aaaa" required minlength="2"></br>                      <!--DATE DE NAISSANCE-->

                    <p class = 'interligneValider_enregistrement'></p>
                    <INPUT class = "boutonValider_enregistrement" TYPE = 'SUBMIT', VALUE = 'Créer votre compte Percutest'><br>
                    <p>En créant un compte, vous acceptez les <a href = "cgu.php">Conditions générales de vente</a> d'Infinite Mesure. Pour toute question, veuillez consulter notre <a href = "faq.php">FAQ</a></p>
                    <p class = 'interligneValider_enregistrement'></p>
                    <hr WIDTH = "300" ALIGN = CENTER>
                    <p class = 'interligneValider_enregistrement'></p>
                    <p>Vous possédez déjà un compte ? <a href = "connexion.php">Identifiez-vous</a></br>
                    Vous voulez vous incrire en tant qu'entraîneur sportif ? <a href = "page_enregistrement_coach.php">Créer votre compte<?php $AfficherFormulaire = 2?></a></p>
                </form>
                </p>

                <?php
                if(isset($_POST['prenom'], $_POST['nom'], $_POST['coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'])){

                    $detection_erreur_enregistrement = 0;
                    $detail_erreur_enregistrement = "";
                    if(!preg_match("#^[a-zA-Z]+$#",$_POST['prenom'])){
                        //echo "Le prénom n'est pas valable";
                        $detail_erreur_enregistrement = "Le prénom utilisé n'est pas valide";
                        $detection_erreur_enregistrement = 1;
                    }
                    //Condition sur le NOM
                    elseif(!preg_match("#^[A-Z]+$#",$_POST['nom'])){
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "Le nom n'est pas valide / Le nom doit être en majuscule";
                    }
                    //Condition sur le NOM DU COACH
                    elseif(!preg_match("#^[A-Z]+$#",$_POST['coach'])){
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "Le nom de votre coach n'est pas valide / Le nom de votre coach doit être en majuscule";
                    }
                    //Condition sur le PSEUDO
                    elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                        $detail_erreur_enregistrement = "Votre nom d'utilisateur doit être en caractère alphanumérique";
                        $detection_erreur_enregistrement = 1;
                    }
                    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['pseudo']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "Ce pseudo est déjà utilisé";
                    }
                    //Condition sur le MOT DE PASSE
                    elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pswd'])){
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "Le format du mot de passe n'est pas valable";
                    }
                    //Condition sur la date de naissance
                    elseif(!preg_match("'^\d{2}/\d{2}/\d{4}$'",$_POST['datedenaissance'])){
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "La date de naissance renseignée n'est pas valable";
                    }
                    //Condition sur l'e-mail
                    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE email='".$_POST['email']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                        $detection_erreur_enregistrement = 1;
                        $detail_erreur_enregistrement = "Cette adresse e-mail est déjà utilisée";
                    }
                    else{
                        $sql = "INSERT INTO Adherents SET firstname = '".$_POST['prenom']."', lastename = '".$_POST['nom']."', coach = '".$_POST['coach']."', pseudo = '".$_POST['pseudo']."', mdp = '".$_POST['pswd']."', email = '".$_POST['email']."', bithdate = '".$_POST['datedenaissance']."'";
                        if(!mysqli_query($conn, $sql)){
                            echo "<h4 class = 'erreur'>Une erreur s'est produite: </h4>".mysqli_error($conn);
                        }
                        else{
                            echo 'Felicitation pour votre adhésion !';
                            //header('Location: page_vérification.php');
                        }
                    }

                    if($detection_erreur_enregistrement == 1){
                        echo "<h4 class = 'erreur_enregistrement'>$detail_erreur_enregistrement</h4>";
                    }
                }
                ?>

            </div>
        <?php
        }
        ?>

    </body>
</html>