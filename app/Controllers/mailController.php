<?php

    namespace App\Controllers;

    class MailController extends Controller{
        function verif(){
            public function contact(){
                return $this->view('main.mail');
            }

            require('view/envoieMail.php');

            if(isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['sujet'], $_POST['message'])){
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
                else{
                    $to = 'max.gacoin@sfr.fr';
                    $from = $_POST['email'];
                    $sujet = $_POST['sujet'];
                    $name_from =  $_POST['nom'];
                    $firstname_from =  $_POST['prenom'];
                    $message_from = $_POST['message'];
                    $message_auto = "Bonjour ".$firstname_from." ".$name_from.",\n Votre mail a bien été reçu, un opérateur va vous répondre dans les plus brefs délais.\n Merci de votre intérêt pour notre service";
                    $sujet_auto = "réponse automatique : on a bien reçu votre message";

                    //echo phpinfo();

                    // Pour envoyer du courrier HTML, l'en-tête Content-type doit être défini.
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Créer les en-têtes de courriel
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'X-Mailer: PHP/' . phpversion();
 
                    if(mail($to, $sujet, $message_from, $headers)){
                        echo"<h4 class = 'reponse_auto'>Merci pour votre message, un mail de confirmation de reception vous sera délivré</4>";
                    }else{
                        echo"<h4 class = 'reponse_auto'>Erreur dans l'envoie de votre message, veuillez réessayer</h4>";
                    }
                    mail($from, $sujet_auto, $message_auto);
                }
                if($detection_erreur_enregistrement == 1){
                    echo "<h4 class = 'erreur_enregistrement'>$detail_erreur_enregistrement</h4>";
                }
            }
        }
    }
?>