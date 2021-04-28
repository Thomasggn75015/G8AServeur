<!DOCTYPE html>
<html>
    <head>
        <title>Infinite Mesure</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_enregistrement_sportif.css" />
    </head>
    <body>
        <header>
            <h1 class = "entete">En tête à remplacer par celui de Thomas</h1>
        </header>

        <h1 class = 'titre'><B>Infinite Mesure</B></h1>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "myDB";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $tableUne = "CREATE Table IF NOT EXISTS Coach(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastename VARCHAR(30) NOT NULL,
                pseudo VARCHAR(30) NOT NULL,
                mdp VARCHAR(30) NOT NULL,
                email VARCHAR(50)
                )";

            //Vérification de la connexion avec la table des adhérents
            
            if(!mysqli_query($conn, $tableUne)){
                echo "Error creating table: ".mysqli_error($conn);
            }
        ?>

        <?php
            //Vérification des conditions dans la mise en forme des données et insertion des information dans la table des adhérents.

            $AfficherFormulaire = 1;
            if(isset($_POST['prenom'], $_POST['nom'], $_POST['coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'])){
                //Condition sur le PRENOM
                if(!preg_match("#^[a-zA-Z]+$#",$_POST['prenom'])){
                    echo "Le prénom n'est pas valable";
                }
                //Condition sur le NOM
                elseif(!preg_match("#^[A-Z]+$#",$_POST['nom'])){
                    echo "Le nom doit être en majuscule";
                }
                
                //Condition sur le PSEUDO
                elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                    echo "Votre nom d'utilisateur doit être en caractère alphanumérique";
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['pseudo']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    echo "Ce pseudo est déjà utilisé.";
                }
                //Condition sur le MOT DE PASSE
                elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pswd'])){
                    echo "Le format du mot de passe n'est pas valable";
                }
                //Condition sur l'e-mail
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['email']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    echo "Cet email est déjà utilisé.";
                }
                else{
                    $sql = "INSERT INTO Adherents SET firstname = '".$_POST['prenom']."', lastename = '".$_POST['nom']."', pseudo = '".$_POST['pseudo']."', mdp = '".$_POST['pswd']."', email = '".$_POST['email']."'";
                    if(!mysqli_query($conn, $sql)){
                        echo "Une erreur s'est produite: ".mysqli_error($conn);
                    } else{
                        //echo 'Felicitation pour votre adhésion !';
                        header('Location: page_vérification.php');
                    }
                }
            }
        
        if($AfficherFormulaire == 1){
            //Données en INPUT renseignées par le nouvel adhérents et correspondants aux critères de la table des adhérents.
        ?>
            <div class = "formulaire">
                <h1 class = "enregistrement"><B class = 'titreEnGras'>Créer un compte</B>(coach)</h1>
                <form class = 'form' ACTION = "page_enregistrement_coach.php" METHOD = "POST">
                    <label for = 'prenom'>Votre prénom</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'prenom', name = 'prenom' placeholder = 'Prénom' required minlength="2" maxlength="50" size="50"></br>                                            <!--PRENOM-->
                    <p class = 'interligneValider'></p>
                    <label for = 'nom'>Votre nom</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'nom', name = 'nom' placeholder = 'NOM' required minlength="2" maxlength="50" size="50"></br>                                                     <!--NOM-->
                    <p class = 'interligneValider'></p>
                    <label for = 'pseudo'>Votre pseudo</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'pseudo', name = 'pseudo' placeholder = "pseudo" required minlength="2" maxlength="50" size="50"></br>                                            <!--PSEUDO-->
                    <p class = 'interligneValider'></p>
                    <label for = 'email'>E-mail</label></br>
                    <INPUT class = "input" TYPE = 'EMAIL', id = 'email', name = 'email' placeholder = "e-mail" required minlength="2" maxlength="50" size="50"></br>                                             <!--E-MAIL-->
                    <p class = 'interligneValider'></p>
                    <label for = 'pswd'>Votre mot de passe</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'pswd', name = 'pswd' placeholder = "Au moins 6 caractères" required minlength="6" maxlength="50" size="50"></br>                                 <!--MOT DE PASSE-->

                    <p class = 'interligneValider'></p>
                    <INPUT class = "boutonValider" TYPE = 'SUBMIT', VALUE = 'Créer votre compte Percutest'><br>
                    <p>En créant un compte, vous acceptez les <a href = "cgu.php">Conditions générales de vente</a> d'Infinite Mesure. Pour toute question, veuillez consulter notre <a href = "faq.php">FAQ</a></p>
                    <p class = 'interligneSeparation'></p>
                    <hr WIDTH = "300" ALIGN = CENTER>
                    <p class = 'interligneSeparation'></p>
                    <p>Vous possédez déjà un compte ? <a href = "connexion.php">Identifiez-vous</a></br>
                    Vous voulez vous incrire en tant que sportif ? <a href = "page_enregistrement_sportif">Créer votre compte<?php $AfficherFormulaire = 2?></a></p>
                </form>
                </p>
            </div>
        <?php
        }
        ?>