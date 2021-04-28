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
            //Vérification des conditions dans la mise en forme des données et insertion des information dans la table des adhérents.

            $AfficherFormulaire = 1;
            /*
            if(isset($_POST['prenom'], $_POST['nom'], $_POST['coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'])){
                //Condition sur le PRENOM
                if(!preg_match("#^[a-zA-Z]+$#",$_POST['prenom'])){
                    echo "Le prénom n'est pas valable";
                }
                //Condition sur le NOM
                elseif(!preg_match("#^[A-Z]+$#",$_POST['nom'])){
                    echo "Le nom doit être en majuscule";
                }
                //Condition sur le NOM DU COACH
                elseif(!preg_match("#^[A-Z]+$#",$_POST['coach'])){
                    echo "Le nom de votre coach doit être en majuscule";
                }
                //Condition sur le PSEUDO
                elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                    echo "Votre nom d'utilisateur doit être en caractère alphanumérique";
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['pseudo']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    echo "<h4 class = 'erreur'>Ce pseudo est déjà utilisé.</h4>";
                }
                //Condition sur le MOT DE PASSE
                elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pswd'])){
                    echo "Le format du mot de passe n'est pas valable";
                }
                //Condition sur la date de naissance
                elseif(!preg_match("'^\d{2}/\d{2}/\d{4}$'",$_POST['datedenaissance'])){
                    echo "La date de naissance renseignée n'est pas valable";
                }
                //Condition sur l'e-mail
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['email']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    echo "Cet email est déjà utilisé.";
                }
                else{
                    $sql = "INSERT INTO Adherents SET firstname = '".$_POST['prenom']."', lastename = '".$_POST['nom']."', coach = '".$_POST['coach']."', pseudo = '".$_POST['pseudo']."', mdp = '".$_POST['pswd']."', email = '".$_POST['email']."', bithdate = '".$_POST['datedenaissance']."'";
                    if(!mysqli_query($conn, $sql)){
                        echo "Une erreur s'est produite: ".mysqli_error($conn);
                    } else{
                        //echo 'Felicitation pour votre adhésion !';
                        header('Location: page_vérification.php');
                    }
                }
            }
            */
        
        if($AfficherFormulaire == 1){
            //Données en INPUT renseignées par le nouvel adhérents et correspondants aux critères de la table des adhérents.
        ?>
            <div class = "formulaire">
                <h1 class = "enregistrement"><B class = 'titreEnGras'>Créer un compte</B>(sportif)</h1>
                <form class = 'form' ACTION = "page_enregistrement_sportif.php" METHOD = "POST">
                    <label for = 'prenom'>Votre prénom</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'prenom', name = 'prenom' placeholder = 'Prénom' required minlength="2"></br>                                            <!--PRENOM-->
                    <p class = 'interligneValider'></p>
                    <label for = 'nom'>Votre nom</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'nom', name = 'nom' placeholder = 'NOM' required minlength="2"></br>                                                     <!--NOM-->
                    <p class = 'interligneValider'></p>
                    <label for = 'coach'>Nom de votre coach</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'coach', name = 'coach' placeholder = 'COACH' required minlength = "2"></br>                                         <!--NOM DU COACH-->
                    <p class = 'interligneValider'></p>
                    <label for = 'pseudo'>Votre pseudo</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'pseudo', name = 'pseudo' placeholder = "pseudo" required minlength="2"></br>                                            <!--PSEUDO-->
                    <p class = 'interligneValider'></p>
                    <label for = 'email'>E-mail</label></br>
                    <INPUT class = "input" TYPE = 'EMAIL', id = 'email', name = 'email' placeholder = "e-mail" required minlength="2"></br>                                             <!--E-MAIL-->
                    <p class = 'interligneValider'></p>
                    <label for = 'pswd'>Votre mot de passe</label></br>
                    <INPUT class = "input" TYPE = 'TEXT', id = 'pswd', name = 'pswd' placeholder = "Au moins 6 caractères" required minlength="8" maxlength="50"></br>                                 <!--MOT DE PASSE-->
                    <p class = 'interligneValider'></p>
                    <label for = 'datedenaissance'>Votre date de naissance</label></br>
                    <INPUT class = "input" TYPE = 'NAME', id = 'datedenaissance', name = 'datedenaissance' placeholder = "jj/mm/aaaa" required minlength="2"></br>                      <!--DATE DE NAISSANCE-->

                    <p class = 'interligneValider'></p>
                    <INPUT class = "boutonValider" TYPE = 'SUBMIT', VALUE = 'Créer votre compte Percutest'><br>
                    <p>En créant un compte, vous acceptez les <a href = "cgu.php">Conditions générales de vente</a> d'Infinite Mesure. Pour toute question, veuillez consulter notre <a href = "faq.php">FAQ</a></p>
                    <p class = 'interligneSeparation'></p>
                    <hr WIDTH = "300" ALIGN = CENTER>
                    <p class = 'interligneSeparation'></p>
                    <p>Vous possédez déjà un compte ? <a href = "connexion.php">Identifiez-vous</a></br>
                    Vous voulez vous incrire en tant qu'entraîneur sportif ? <a href = "page_enregistrement_coach">Créer votre compte<?php $AfficherFormulaire = 2?></a></p>
                </form>
                </p>

                <?php
                if(isset($_POST['prenom'], $_POST['nom'], $_POST['coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'])){
                    //Condition sur le PRENOM
                    if(!preg_match("#^[a-zA-Z]+$#",$_POST['prenom'])){
                        echo "Le prénom n'est pas valable";
                    }
                    //Condition sur le NOM
                    elseif(!preg_match("#^[A-Z]+$#",$_POST['nom'])){
                        echo "Le nom doit être en majuscule";
                    }
                    //Condition sur le NOM DU COACH
                    elseif(!preg_match("#^[A-Z]+$#",$_POST['coach'])){
                        echo "Le nom de votre coach doit être en majuscule";
                    }
                    //Condition sur le PSEUDO
                    elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                        echo "Votre nom d'utilisateur doit être en caractère alphanumérique";
                    }
                    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['pseudo']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                        echo "<h4 class = 'erreur'>Ce pseudo est déjà utilisé.</h4>";
                    }
                    //Condition sur le MOT DE PASSE
                    elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pswd'])){
                        echo "Le format du mot de passe n'est pas valable";
                    }
                    //Condition sur la date de naissance
                    elseif(!preg_match("'^\d{2}/\d{2}/\d{4}$'",$_POST['datedenaissance'])){
                        echo "La date de naissance renseignée n'est pas valable";
                    }
                    //Condition sur l'e-mail
                    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM adherents WHERE pseudo='".$_POST['email']."'"))==TRUE){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                        echo "Cet email est déjà utilisé.";
                    }
                    else{
                        $sql = "INSERT INTO Adherents SET firstname = '".$_POST['prenom']."', lastename = '".$_POST['nom']."', coach = '".$_POST['coach']."', pseudo = '".$_POST['pseudo']."', mdp = '".$_POST['pswd']."', email = '".$_POST['email']."', bithdate = '".$_POST['datedenaissance']."'";
                        if(!mysqli_query($conn, $sql)){
                            echo "Une erreur s'est produite: ".mysqli_error($conn);
                        } else{
                            //echo 'Felicitation pour votre adhésion !';
                            header('Location: page_vérification.php');
                        }
                    }
                }
                ?>

            </div>
        <?php
        }
        ?>

    </body>
</html>