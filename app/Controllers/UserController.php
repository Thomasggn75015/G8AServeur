<?php

    namespace App\Controllers;
    use App\Models\User;
    class UserController extends Controller{
        public function enregistrement(){
            return $this->view('main.enregistrement');
        }

        public function verif(){
            if(isset($_POST['prenom'], $_POST['nom'], $_POST['store_coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'], $_POST['role_user'])){
                $detection_erreur_enregistrement = 0;
                $detail_erreur_enregistrement = "";
                if(!preg_match("#^[a-zA-Z]+$#",$_POST['prenom'])){
                    $detail_erreur_enregistrement = "Le prénom utilisé n'est pas valide";
                    $detection_erreur_enregistrement = 1;
                }
                //Condition sur le NOM
                elseif(!preg_match("#^[A-Z]+$#",$_POST['nom'])){
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Le nom n'est pas valide / Le nom doit être en majuscule";
                }
                //Condition sur le NOM DU COACH
                elseif(!preg_match("#^[A-Z]+$#",$_POST['store_coach'])){
                    echo $_POST['store_coach'];
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Le nom de votre coach n'est pas valide / Le nom de votre coach doit être en majuscule";
                }
                //Condition sur le PSEUDO
                elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pseudo'])){
                    $detail_erreur_enregistrement = "Votre nom d'utilisateur doit être en caractère alphanumérique";
                    $detection_erreur_enregistrement = 1;
                }
                elseif((new User($this->getDB()))->findUserByEntry('pseudo', $_POST['pseudo']) !== null){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Ce pseudo est déjà utilisé";
                }
                //Condition sur le MOT DE PASSE
                elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['pswd'])){
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Le format du mot de passe n'est pas valable";
                }
                //Condition sur la date de naissance
                elseif(!preg_match("'^\d{2}/\d{2}/\d{4}$'",$_POST['datedenaissance'])){
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "La date de naissance renseignée n'est pas valable";
                }
                //Condition sur l'e-mail
                elseif((new User($this->getDB()))->findUserByEntry('email', $_POST['email']) !== null){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                    $detection_erreur_enregistrement = 1;
                    $detail_erreur_enregistrement = "Cette adresse e-mail est déjà utilisée";
                }
                else{
                    $signinInfo = array($_POST['prenom'], $_POST['nom'], $_POST['store_coach'], $_POST['pseudo'], $_POST['pswd'], $_POST['email'], $_POST['datedenaissance'], $_POST['role_user']);
                    (new User($this->getDB()))->setInformationInscription($signinInfo);
                    header('Location: /connexion');
                }

                if($detection_erreur_enregistrement == 1){
                    echo "<div class = 'enregistrement_formulaire'><h4 class = 'erreur_enregistrement'>$detail_erreur_enregistrement</h4></div>";
                }
            }
        }
    }
?>