<!DOCTYPE HTML>
<html>
    <?php ob_start();?>

    <h1 id = "titre_results">Récapitulatif des performances sportives</h1>
    <div id = "results">
        <div id = 'choose_results'>
            <INPUT class = 'select_test' ID = "lumina" TYPE = "BUTTON", VALUE = 'Lumière inattendue', onClick = "show_result_lumiere_inattendue('maga')"></br>
            <INPUT class = 'select_test' ID = "rythme" TYPE = "BUTTON", VALUE = 'Suivi de rythme', onClick = "show_result_rythme()"></br>
            <INPUT class = 'select_test' ID = "frecar" TYPE = "BUTTON", VALUE = 'Fréquence cardiaque', onClick = "show_result_frequence_cardiaque()"></br>
            <INPUT class = 'select_test' ID = "temper" TYPE = "BUTTON", VALUE = 'Température cutanée', onClick = "show_result_temperature()"></br>
            <INPUT class = 'select_test' ID = "recson" TYPE = "BUTTON", VALUE = 'Reconnaissance sonore', onClick = "show_result_reconnaissance_sonore()">
        </div>
        
        <div id = 'show_results'>

        </div>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

</html>