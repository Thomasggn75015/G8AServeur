<!DOCTYPE HTML>
<html>
    <?php ob_start();?>

    <div id='contact'>
        <h1 id = "titre_contact">Nous contacter</h1>
        <form class = 'form_contact' NAME = "form_contact" ACTION = "indexInscription.php" METHOD = "POST">
            <div id='indic_prenom' class="champ_contact">
                <label for = 'prenom'>VOTRE PRENOM :</label></br>
                <INPUT class = "input_contact" TYPE = 'TEXT', id = 'prenom', name = 'prenom' placeholder = 'Prénom' required minlength="2"></br>
            </div>
            <div id='indic_nom' class="champ_contact">
                <label for = 'nom'>VOTRE NOM :</label></br>
                <INPUT class = "input_contact" TYPE = 'TEXT', id = 'nom', name = 'nom' placeholder = 'Nom' required minlength="2"></br>
            </div>
            <div id='indic_email' class="champ_contact">
                <label for = 'email'>VOTRE COURRIEL :</label></br>
                <INPUT class = "input_contact" TYPE = 'EMAIL', id = 'email', name = 'email' placeholder = 'E-mail' required minlength="2"></br>
            </div>
            <div id='indic_sujet' class="champ_contact">
                <label for = 'sujet'>MOTIF DE VOTRE DEMANDE :</label></br>
                <INPUT class = "input_contact" TYPE = 'TEXT', id = 'sujet', name = 'sujet' placeholder = 'Sujet' required minlength="2"></br>
            </div>
            <div id='indic_message' class="champ_contact">
                <label for = 'message'>MESSAGE :</label></br>
                <TEXTAREA class = 'input_contact' id = 'message', name = 'message' required></TEXTAREA></br>
            </div>
            <INPUT class = "boutonValider_contact" TYPE = 'SUBMIT', VALUE = 'ENVOYER  >'><br>
        </form>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

</html>