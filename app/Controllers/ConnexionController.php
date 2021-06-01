<?php

    namespace App\Controllers;

    use App\Models\ConnexionModel;
class ConnexionController extends Controller{

        function connect(){
            return $this->view('main.connexion');
        }

        function verifConnect(){
            $detectionErreur = 0;
            if(!(isset($_POST['username'], $_POST['password']))){
                $erreur = 0;
                $detail_erreur = '';
                if(!isset($_POST['username'])){
                    $erreur = 1;
                    $detail_erreur = 'Veuillez renseigner votre identifiant !';
                }
                elseif(!isset($_POST['password'])){
                    $erreur = 1;
                    $detail_erreur = 'Veuillez renseigner votre mot de passe !';
                }

                if($erreur == 1){
                    echo "<h4 class = 'detail_erreur'>$detail_erreur</h4>";
                }
            } elseif(isset($_POST['username'], $_POST['password'])){
                $userVariables = (new ConnexionModel($this->getDB()))->connectCheck($_POST['username'], $_POST['password']);
            
                if($userVariables != false){
                    $this->setCurrentSession($userVariables[0]["id"], $userVariables[0]["pseudo"], $userVariables[0]["user_role"], $userVariables[0]["email"]);
                    header("Location: /");
                }
            }
        }
}
