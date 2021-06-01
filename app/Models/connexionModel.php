<?php
    class ConnexionModel extends Model
    {
        protected $table = "Adherents";

        function connect($user, $pswd)
        {
            $verifPswd = query("SELECT mdp FROM {$this->table} WHERE lastname= ?", [$user]);

            if(md5($pswd) == $verifPswd )
            {
                header('Location: /profil')
            }

            else
            {
                echo("Erreur d'authentification !");
                header('Location: /connexion');
            }
            
        }
    }
?>