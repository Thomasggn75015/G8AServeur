<?php
$userId = null;
$userRole = null;
if(isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
}
if(isset($_SESSION['user_role'])){
    $userRole = $_SESSION['user_role'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Infinite Measures </title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

    <header id="menu_nav">
        <?php 
            if(isset($_SESSION['user_id'])){
        ?> 
                <a href="index.php" id="link_logo"><img id="logo" src="Images/Infinite_measures.png"  alt="logo Accueil" /></a>
                <nav class="navbar">
                    <ul>
                        <li><a href="page_enregistrement.php" class="nav_button">Inscription</a></li>
                        <li><a href="connexion.php" class="nav_button">Connexion</a></li>
                        <li><a href="faq.php" class="nav_button">FAQ</a></li>
                        <li><a href="cgu.php" class="nav_button">CGU</a></li>
                    </ul>
                </nav>
            <?php
            } else {
            ?>
                <a href="index.php" id="link_logo"><img id="logo" src="public/images/Infinite_measures.png"  alt="logo Accueil" /></a>
                <nav class="navbar">
                    <ul>
                        <li><a href="Profil" class="nav_button">Profil</a></li>
                        <li><a href="Données" class="nav_button">Mes données</a></li>
                        <li><a href="faq.php" class="nav_button">FAQ</a></li>
                        <li><a href="cgu.php" class="nav_button">CGU</a></li>
                    </ul>
                </nav>
            <?php
            }
            ?>
        <script src="public/js/JSNav.js"></script>
    </header>

    <body>
    <?= $content ?>
    </body>
</html>