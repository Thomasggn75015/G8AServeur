<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Infinite Measures </title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    </head>

    <body>
        <header id="menu_nav">
            <?php 
                if(isset($_SESSION['user_id'])){
            ?> 
                    <a href="/" id="link_logo"><img id="logo" src="public/images/Infinite_measures.png"  alt="logo Accueil" /></a>
                    <nav class="navbar">
                        <ul>
                            <li><a href="/profil" class="nav_button">Profil</a></li>
                            <li><a href="/data_user" class="nav_button">Mes données</a></li>
                            <li><a href="/faq" class="nav_button">FAQ</a></li>
                            <li><a href="/destroy" class="nav_button">Deconnexion</a></li>
                        </ul>
                    </nav>
                <?php
                    } else {
                ?>
                    <a href="/" id="link_logo"><img id="logo" src="public/images/Infinite_measures.png"  alt="logo Accueil" /></a>
                    <nav class="navbar">
                        <ul>
                            <li><a href="/enregistrement" class="nav_button">Inscription</a></li>
                            <li><a href="/connexion" class="nav_button">Connexion</a></li>
                            <li><a href="/faq" class="nav_button">FAQ</a></li>
                        </ul>
                    </nav>
                <?php
                    }
                ?>
        </header>

        <?= $content ?>

        <footer class="footer">
                    <ul class="social_logos">
                        <li><a href="https://fr.linkedin.com" class="footer_link"><img src="public/images/linkedin.png" alt="logo linkedIn" class="social_logo"/></a></li> <!-- LinkedIn, facebook, Contact mail -->
                        <li><a href="https://www.facebook.com" class="footer_link"><img src="public/images/facebook.png" alt="logo Facebook" class="social_logo"/></a></li>
                        <li><a href="/sendMail" class="footer_link"><img src="public/images/mail.png" alt="logo Mail" class="social_logo"/></a></li>
                    </ul>
                    <h1 class="footer_contact-message"> Contactez nous </h1>
                    <ul class="footer_nav">
                        <li><a href="/cgu" class="footer_link">CGU</a></li>
                        <li><a href="/legalMention" class="footer_link">Mentions légales</a></li>
                    </ul>
        </footer>
    </body>
</html>