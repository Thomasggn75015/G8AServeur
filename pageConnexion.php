<!DOCTYPE html>
<head>
        <title>Page de connexion</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="pageConnexion.css" media="screen" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
</head>

<body>
    <div id="container">
        <form action="pageConnexion.php" method="POST">

            <h1 class="Connexion_titre_blocConnexion">Connexion</h1>

            <label >Login<br></label>
            <input type="text" placeholder="Login" name="username" class="Connexion_input_login"><br>

            <label>Password<br></label>
            <input type="text" placeholder="Password" name="password" class="Connexion_input_password"><br>

            <input type="submit" name="submitConnexion" value="Continuer" class="Connexion_bouton_continuer">
            <input type="submit" name="submitInscription" value="Inscription" class="Connexion_bouton_inscription">
        </form>

        <?php 
        if( ( isset($_POST['username']) ) && ($_POST['username'] != '') && ( isset($_POST['password']) ) && ($_POST['password'] != '')  
        ){
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }

            $password = $_POST['password'];
            $username = $_POST['username'];

            echo gettype($password);
            //echo $username;
            

            //$reponse = $bdd->query('SELECT mdp FROM CIA WHERE user = \''.$username.'\' ');

            $reponse = $bdd -> prepare('SELECT mdp FROM CIA WHERE user = ?');
            $reponse -> execute( array($_POST['username']) ); 

            echo gettype($reponse);

            $rep = serialize($reponse);

            //echo ' '.$reponse;
            //echo '<pre>'.print_r($reponse,true).'</pre>';

            $autorise = "<p style = 'color : green;'> Accès autorisé ! </p>";
            $refuse = "<p style = 'color : red;'> Accès refusé ! </p>";
            

            if($rep == $password){
                echo "Je suis vrai";
                echo $autorise;
            } else {
                echo "Je suis faux";
                echo $refuse;
            }
            
            
        }
        ?>



    </div>
    

</body>