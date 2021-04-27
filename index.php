<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" >
        <title>Documentation</title>

    </head>

    <body>
        <div id="bloc">
                
                <form action="" method="POST">
                    <h1>Connexion</h1>
                    
                    <label><b>Nom d'utilisateur</b></label>
                    
                    <input type="text" placeholder="Utilisateur" name="username" ><br>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Mot de passe" name="password" ><br>

                    <input type="submit" id='submit' value='LOGIN' >
                </form>  

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
