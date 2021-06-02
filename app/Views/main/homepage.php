<div class="bloc_accueil">
		<h1 class="titre_accueil">Bienvenue sur le site d'Infinite Measures</h1>

		<h2 class="sous-titre_accueil">Améliorez vos performances à l'aide de nos tests de capacités physiques</h2>

		<div class="paragraphe_bouton">
			<p class="paragraphe_accueil">
					La société Infinite Measures réalise des tests de performance technique afin de vous aider à améliorer vos résultats dans votre sport de prédilection. Utiliser Infinite Measures, c'est s'assurer une progression constante.
			</p>
			<?php if(!isset($_SESSION["user_id"])){ ?>
				<a href="/enregistrement" class="nav_button" id="join-programme">Rejoindre le programme</a>
			<?php } ?>
		</div>
</div>