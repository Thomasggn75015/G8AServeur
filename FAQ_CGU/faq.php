<!DOCTYPE html>
<html>
<head> 
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_viviane.css" />
        <title>FAQ</title>
</head>

<header>
	<?php include("menu_nav.php");?>
</header>

<body>
<div id="corps_FAQ_CGU">
	
	<h1 id="faq_cgu-titrePage">FAQ</h1>

	<?php
	session_start();
			try {
				$bdd = new PDO('mysql:host=localhost; dbname=percutech; charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
	?>

	<div class="faq_main">
		<form action="faq.php" method="post">
		
				<?php
					$idQ = 0;
					global $afficher;
					$sql = 'SELECT * FROM questions';
					$req = $bdd->query($sql);
					foreach ($req as $row) {
						echo '<div class="faq_menu"><input class="faq_menu-question" type="submit" name="question'.++$idQ.'" value="'.$row['Content'].'"/></div>';
						if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question'.$idQ])) {
							$sql2 = 'SELECT Content FROM reponses WHERE ID='.$idQ;
							$req2 = $bdd->query($sql2);
							$data = $req2->fetch(PDO::FETCH_ASSOC);
							$afficher = $data['Content'];
						}
					}
				?>
		</form>
	<span class="separateur"></span>
	<?php
		echo '<div class="faq_main-reponse">'.$afficher.'</div>';
	?>
	</div>

</body>

</html>
