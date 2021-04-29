<!DOCTYPE html>

<html>
  <head>
        <title>Page de connexion</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">         
    </head>

    <body>
        <div id="bloc">
                
        <div id = "container">
            <form action="" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="email" placeholder="Entrer le login" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <!--<p>Si vous ne possédez pas de compte : <a href="connexion.html">Inscrivez-vous</a></p>-->
                <input type="submit" id='submit2' value='INSCRIPTION' >
            </form>

        </div>  

                    <?php

                    if( ( isset($_POST['username']) ) && ($_POST['username'] != '') && ( isset($_POST['password']) ) && ($_POST['password'] != '')  
                    ){

                      try{
                          $db = new PDO('mysql:host = localhost;dbname=test2', 'admin', ' ');

                      } catch(PDOException $e) {
                        print "Erreur ! ".$e->getMessage()."<br/>";
                        die();
                      }

                      $password = $_POST['password'];
                      $password_hash = sha1($_POST['password']);
                      
                      $query = 'SELECT * FROM tuto WHERE username = \''.$_POST['username'].'\' AND password = \''.$password_hash.'\'';
                      echo $query;

                      $reponse = $db -> prepare('SELECT * FROM tuto WHERE username = :username AND password = :password');
                      $reponse -> execute(array('username' => $_POST['username'], 'password' => $password));

                      #$reponse = $db -> query('SELECT * FROM tuto WHERE username = \''.$_POST['username'].'\' AND password = \''.$password.'\'');
                      
                      $user = $reponse -> fetch();




                      $autorise = "<p style = 'color : green;'> Accès autorisé ! </p>";
                      $refuse = "<p style = 'color : red;'> Accès refusé ! </p>";

                      if($user){
                        echo $autorise;
                      } else {
                        echo $refuse;
                      }

                      
                    }
                    ?>
                
                
        </div>
    </body>

</html>
