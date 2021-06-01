    <h1 class = "enregistrement"><B class = 'titreEnGras'>Créer un compte</h1>
    <form class = 'form' NAME = "form" ACTION = "indexInscription.php" METHOD = "POST">
        <section id='section_prenom'>
            <label for = 'prenom'>Votre prénom</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'prenom', name = 'prenom' placeholder = 'Prénom' required minlength="2"></br>               <!--PRENOM-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_nom'>
            <label for = 'nom'>Votre nom</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'nom', name = 'nom' placeholder = 'NOM' required minlength="2"></br>                                <!--NOM-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_coach'>
            <label for = 'check_coach'>Avez-vous un entraineur ? </label>
            <INPUT TYPE = 'radio', id = 'check_coach_yes', name = 'checkcoach', onClick = "control_CB(form)"> OUI    
            <INPUT TYPE = 'radio', id = 'check_coach_no', name = 'checkcoach', onClick = "control_CB(form)"> NON    
            <INPUT TYPE = 'radio', id = 'check_coach_iam', name = 'checkcoach', onClick = "control_CB(form)"> JE SUIS ENTRAINEUR</br>

            <label for = 'coach'>Nom de votre coach</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'coach', name = 'coach', value = "" placeholder = 'COACH' minlength = "2" disabled required>    <!--NOM DU COACH-->
                <INPUT TYPE = 'hidden', id = 'role_user'  NAME = "role_user", placeholder = "noValue" required>
            <INPUT TYPE = 'hidden', id = 'store_coach'  NAME = "store_coach", placeholder = "noValue" required>
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_pseudo'>
            <label for = 'pseudo'>Votre pseudo</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'pseudo', name = 'pseudo' placeholder = "pseudo" required minlength="2"></br>   <!--PSEUDO-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_email'>
            <label for = 'email'>E-mail</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'EMAIL', id = 'email', name = 'email' placeholder = "e-mail" required minlength="2"></br>      <!--E-MAIL-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_pswd'>
            <label for = 'pswd'>Votre mot de passe</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'TEXT', id = 'pswd', name = 'pswd' placeholder = "Au moins 6 caractères" required minlength="8" maxlength="50"></br>   <!--MOT DE PASSE-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

        <section id='section_birthdate'>
            <label for = 'datedenaissance'>Votre date de naissance</label></br>
            <INPUT class = "input_enregistrement" TYPE = 'NAME', id = 'datedenaissance', name = 'datedenaissance' placeholder = "jj/mm/aaaa" required minlength="2"></br>  <!--DATE DE NAISSANCE-->
            <p class = 'interligneValider_enregistrement'></p>
        </section>

            <INPUT class = "boutonValider_enregistrement" TYPE = 'SUBMIT', VALUE = 'Créer votre compte Percutest', onClick = "definition_coach()"><br>
            <p>En créant un compte, vous acceptez les <a href = "cgu.php">Conditions générales de vente</a> d'Infinite Mesure. Pour toute question, veuillez consulter notre <a href = "faq.php">FAQ</a></p>
            <p class = 'interligneValider_enregistrement'></p>

            <hr WIDTH = "300" ALIGN = CENTER>
            <p class = 'interligneValider_enregistrement'></p>
            <p>Vous possédez déjà un compte ? <a href = "connexion.php">Identifiez-vous</a></p>
    </form>
