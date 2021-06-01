<?php
    namespace App\Models;
    class ConnexionModel extends Model{
        protected $table = "Adherents";

        function connectCheck($user, $pswd)
        {
            $verifPswd = $this->query("SELECT mdp, id, pseudo, user_role, email FROM {$this->table} WHERE pseudo= ?", [$user]);
            if(/*md5(*/$pswd/*)*/ == $verifPswd[0]["mdp"])
            {
                return $verifPswd;
            }

            else
            {
                return false;
            }
            
        }
    }
?>