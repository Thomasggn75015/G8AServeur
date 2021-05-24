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

	<div id="faq_main">
	<div id="faq_menu">

		<form action="faq.php" method="post">
			<div class="faq_menu_contenu">
				<input class="faq_menu-question" type="submit" name="question1" value="L'inscription aux services proposés par Infinite Measures est-elle gratuite ?" /> 
				<input class="faq_menu-question" type="submit" name="question2" value="Est-ce que mes données psychotechniques sont publiques ?" /> 
				<input class="faq_menu-question" type="submit" name="question3" value="Question 3" /> 
				<input class="faq_menu-question" type="submit" name="question4" value="Question 4" /> 
				<input class="faq_menu-question" type="submit" name="question5" value="Question 5" /> 
				<input class="faq_menu-question" type="submit" name="question6" value="Question 6" /> 
				<input class="faq_menu-question" type="submit" name="question7" value="Question 7" /> 
				<input class="faq_menu-question" type="submit" name="question8" value="Question 8" /> 
				<input class="faq_menu-question" type="submit" name="question9" value="Question 9" /> 
				<input class="faq_menu-question" type="submit" name="question10" value="Question 10" /> 
			</div>
		</form>

	</div>

	<?php
	session_start();

		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question1'])) {
			reponse1();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question2'])) {
			reponse2();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question3'])) {
			reponse3();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question4'])) {
			reponse4();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question5'])) {
			reponse5();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question6'])) {
			reponse6();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question7'])) {
			reponse7();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question8'])) {
			reponse8();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question9'])) {
			reponse9();
		}
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['question10'])) {
			reponse10();
		}
	?>

	<?php
		function reponse1() {
	?>
			<p class="faq_main-reponse"> L'inscription au site est gratuite, mais l'appareil de mesures psychotechniques est payant. </p>
	<?php   }	?>
	<?php
		function reponse2() {
	?>
			<p class="faq_main-reponse"> Non, nous vous assurons que vos données et résultats sont accessibles uniquement par vous et votre coatch. </p>  
	<?php   }	?>
	<?php
		function reponse3() {
	?>
			<p class="faq_main-reponse"> Réponse 3 </p>  
	<?php   }	?>
	<?php
		function reponse4() {
	?>
			<p class="faq_main-reponse"> Réponse 4 </p>  
	<?php   }	?>
	<?php
		function reponse5() {
	?>
			<p class="faq_main-reponse"> Réponse 5 </p>  
	<?php   }	?>
	<?php
		function reponse6() {
	?>
			<p class="faq_main-reponse"> Réponse 6 </p>  
	<?php   }	?>
	<?php
		function reponse7() {
	?>
			<p class="faq_main-reponse"> Réponse 7 </p>  
	<?php   }	?>
	<?php
		function reponse8() {
	?>
			<p class="faq_main-reponse"> Réponse 8 </p>  
	<?php   }	?>
	<?php
		function reponse9() {
	?>
			<p class="faq_main-reponse"> Réponse 9 </p>  
	<?php   }	?>
	<?php
		function reponse10() {
	?>
			<p class="faq_main-reponse"> Réponse 10 </p>  
	<?php   }	?>

	<?php
	session_destroy();
	?>
	</div>

</div>
</body>

</html>
