<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_enregistrement_sportif.css" />
    </head>
    <body>
        <header>
            <?php include("menu_nav.php");?>    
        </header>

        <h1 class = 'titre'><B>Infinite Mesure</B></h1>

        <?php
            $AfficherConfirmation = 1;
            $nombreDeConfirmation= rand(1000, 9999);
        ?>

        <?php
            if(isset($_POST['nombreConfirmation'])){
                if($_POST ['nombreConfirmation'] == $nombreDeConfirmation){
                    echo "<h4 class = 'messageErreurVerification'>Le nombre n'est pas celui qui est indiqué, veuillez recommencer</h6>";
                }else{
                    //echo "Félicitation, vous avez finalisé votre inscription";
                    $AfficherConfirmation = 0;
                }
            }
        ?>
        
        <?php
        if($AfficherConfirmation == 1){
        ?>
            <div class = "formulaire">
                <form class = "formulaireDeConfirmation" ACTION = 'page_vérification' MEtHOD = 'POST'>
                    <label for = 'nombreConfirmation'>Veuillez entrer le numéro de confirmation affiché dans la barre de saisie</label>
                    <INPUT class = 'inputConfirmation' TYPE = 'NUMBER', id = 'nombreConfirmation', name = 'nombreConfirmation' placeholder = <?php echo $nombreDeConfirmation?> required minlength = "4" maxlength = "4" size = "10"></br>
                    <p class = 'interligneValider'></p>
                    <INPUT class = "boutonValider" TYPE = 'SUBMIT', VALUE = 'Créer votre compte Percutest'><br>
                </form>
            </div>
        <?php
        }
        ?>

        

    </body>
</html>