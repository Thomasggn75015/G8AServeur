<?php

    namespace App\Controllers;

    class ConnexionController extends Controller
    {
        function verifConnection()
        {
            require('Views/connexion.php');
            require('Models/connexionModel.php');
            $detectionErreur = 0;

            if( !( isset($_POST['username'], $_POST['password']) ) )
            {
                $erreur = 0;
                $detail_erreur = '';

                if(!isset($_POST['username']))
                {
                    $erreur = 1;
                    $detail_erreur = 'Veuillez renseigner votre identifiant !';
                }

                elseif(!isset($_POST['password']))
                {
                    $erreur = 1;
                    $detail_erreur = 'Veuillez renseigner votre mot de passe !';
                }

                if($erreur == 1)
                {
                    echo "<h4 class = 'detail_erreur'>$detail_erreur</h4>";
                }
            }

        }

        function connect()
        {
            return $this->view('main.connexion');
        }
    }
?>