<div class="profil_form-block">
        <h1>Modification du profil</h1>
        <form class="profil_form-modif" method="post" action="profil.php">
                <div class="profil_bloc-pseudonyme">
                    <h2><?php echo 'Pseudonyme actuel : ' . $infos_profil["pseudo"]?></h2>
                    <label for="pseudo">Changer le pseudonyme</label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Nouveau pseudo"/>
                </div>
                <label for="mdp">Changer le mot de passe</label>
                <input type="text" id="mdp" name="mdp" placeholder="Nouveau mot de passe"/>
                <div class="profil_bloc-email">
                    <h2><?php echo 'Email actuel : ' . $infos_profil["email"]?></h2>
                    <label for="email">Changer l'email</label>
                    <input type="text" id="email" name="email" placeholder="Nouvel email"/>
                </div>
                <input type="submit" value="Valider les changements"/>
        </form>
</div>