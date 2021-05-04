<?php
    session_start();
?>

<!DOCTYPE html>
<html>
	<head> 
	        <meta charset="utf-8" />
	        <link rel="stylesheet" href="style.css" />
	        <title>Profil</title>
	</head>

    <header><?php include("menu_nav.php");?></header>

    <body class="profil_corps">
        <?php
            // Create connection
            try{
            $connexion = new PDO('localhost', 'Percutech', 'Boxe_BDD_G8A', 'percutech');
            }
            // Catch error
            catch(Exception $e){
                die("Connection failed: " . $e->getMessage());
            }
            $infos_profil = $connexion->prepare('SELECT firstname, lastename, pseudo, email FROM Adherents WHERE id = ?');
            $infos_profil->execute($_SESSION['user_id']);
        ?>


        <div class="profil_form-block">
            <h1>Modification du profil</h1>
            <form class="profil_form-modif" method="post" action="profil.php">
                <div class="profil_bloc-pseudonyme">
                    <h2><?php echo 'Pseudonyme actuel : ' . $infos_profil["pseudo"]?></h2>
                    <label for="pseudo">Changer le pseudonyme</label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Nouveau pseudo"/>
                </div>
                <label for="mdp">Changer le mot de passe</label>
                <input type="text" id="mdp" name="mdp" placeholder="Nouveau mot de passe"/>
                <div class="profil_bloc-email">
                    <h2><?php echo 'Email actuel : ' . $infos_profil["email"]?></h2>
                    <label for="email">Changer l'email</label>
                    <input type="text" id="email" name="email" placeholder="Nouvel email"/>
                </div>
                <input type="submit" value="Valider les changements"/>
            </form>
        </div>

        <?php 
            $erreur_enregistrement = 0;
            $detail_erreur_enregistrement = "";

            //On prépare des variables qui vérifient si les champs modifiés n'existe pas déjà
            $pseudoset = $connexion->prepare('SHOW pseudo FROM Adherents WHERE pseudo = ?');
            $pseudoset->execute($_POST['pseudo']);

            $mdpset = $connexion->prepare('SHOW mdp FROM Adherents WHERE mdp = ?');
            $mdpset->execute($_POST['mdp']);
            
            $emailset = $connexion->prepare('SHOW email FROM Adherents WHERE email = ?');
            $emailset->execute($_POST['email']);


            if(isset($_POST['pseudo']) || isset($_POST['mdp']) || isset($_POST['email'])){
                echo 'Veuillez renseigner les champs que vous souhaitez modifier';
                $erreur_enregistrement = 1;
            
                //Conditions sur le PSEUDO
                if(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                    $detail_erreur_enregistrement = "Votre nom d'utilisateur doit être en caractère alphanumérique";
                    $erreur_enregistrement = 1;
                }

                elseif(isset($pseudoset)){
                //on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Ce pseudo est déjà utilisé";
                }


                //Condition sur le MOT DE PASSE
                elseif(!preg_match("#^[a-z0-9]+$#",$_POST['mdp'])){
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Le format du mot de passe n'est pas valable";
                }

                elseif(isset($mdpset)){
                //on vérifie que ce mot de passe n'est pas déjà utilisé par un autre membre
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Ce mot de passe est déjà utilisé";
                }

                //Condition sur l'EMAIL
                elseif(isset($emailset)){
                //on vérifie que cet email n'est pas déjà utilisé par un autre membre
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Cet email est déjà utilisé";
                }

                else{
                    try{
                        //Update fields of selected user
                        $modification = $connexion->prepare('UPDATE Adherents SET pseudo = :pseudo, mdp = :mdp, email = :email WHERE id = :id');
                        $modification->execute(array('pseudo' => $_POST['pseudo'],
                                                    'mdp' => $_POST['mdp'],
                                                    'email' => $_POST['email'],
                                                    'id' => $_SESSION['user_id']
                        ));
                        echo 'Modifications effectuées avec succès';
                    }
                    catch(Exception $e){
                        die('Erreur dans la modification des données' . $e->getMessage());
                    }
                }
            }
        ?>
    </body>
</html>