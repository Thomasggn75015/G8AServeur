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
            $connexion = mysqli_connect('localhost', 'Percutech', 'Boxe_BDD_G8A', 'percutech');
            }
            // Catch error
            catch(Exception $e){
                die("Connection failed: " . mysqli_connect_error());
            }
            $infos_profil = $connexion->prepare('SELECT firstname, lastename, pseudo, email FROM Adherents WHERE id = ?');
            $infos_profil->execute($_SESSION['id']);
        ?>

<!--
        <div class="profil_infos-block">
            <h1><#?php echo 'Bienvenue sur votre profil' . $infos_profil['firstname'] . $infos_profil['lastname']; ?></h1>
            <ul>
                <li><#?php echo 'Pseudonyme : ' . $infos_profil['pseudo']?></li>
                <li><#?php echo 'Adresse mail : ' . $infos_profil['email']?></li>
            </ul>
        </div>
        -->


        <div class="profil_form-block">
            <h1>Modification du profil</h1>
            <form class="profil_form-modif" method="post" action="profil.php">
                <label for="pseudo">Changer le pseudonyme</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Nouveau pseudo"/>
                <label for="mdp">Changer le mot de passe</label>
                <input type="text" id="mdp" name="mdp" placeholder="Nouveau mot de passe"/>
                <label for="email">Changer l'email</label>
                <input type="text" id="email" name="email" placeholder="Nouvel email"/>
                <input type="submit" value="Valider"/>
            </form>
        </div>
    </body>
</html>