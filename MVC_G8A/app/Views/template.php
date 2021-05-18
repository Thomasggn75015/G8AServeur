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
        <title><?= $title ?></title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <header>
        <?php 
        if(isset($_SESSION['user_id'])){ 
            include('menu_nav_connecte.php');
        } else {
            include("menu_nav_invite.php");
        }
        ?>
    </header>

    <body>
        <?= $content ?>
    </body>
</html>