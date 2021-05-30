<div class="bloc-profil">
        <form class="form-recherche" method="POST" action="/profil">
            <label for="critereSelect">Selon quel critère souhaitez-vous rechercher un utilisateur ?</label>
            <br/>
            <select name="critereSelect" id="critereSelect">
                <option value="pseudo">Nom d'utilisateur</option>
                <option value="email">Mail</option>
                <option value="coachname">Nom du coach</option>
                <option value="firstname">Prénom</option>
                <option value="lastname">Nom</option>
                <option value="birthdate">Date de naissance</option>
            </select>
            <br/>
            <label class="label-recherche">Entrer les critères de recherche d'utilisateur</label>
            <br/>
            <input type="text" name="searchEntry" placeholder="ex. Jean"/>
            <br/>
            <button type="submit">Rechercher</button>
        </form>
    <div class="profil_form-bloc">
            <h1>Modification du profil</h1>
            <form class="profil_form-modif" method="post" action="/profil">
                    <div class="profil_bloc-pseudonyme">
                        <!--<h2><?php echo 'Pseudonyme actuel : ' . $infos_profil["pseudo"]?></h2>-->
                        <label for="pseudo">Changer le pseudonyme</label>
                        <input type="text" id="pseudo" name="pseudo" placeholder="Nouveau pseudo"/>
                    </div>
                    <label for="mdp">Changer le mot de passe</label>
                    <input type="text" id="mdp" name="mdp" placeholder="Nouveau mot de passe"/>
                    <div class="profil_bloc-email">
                        <!--<h2><?php echo 'Email actuel : ' . $infos_profil["email"]?></h2>-->
                        <label for="email">Changer l'email</label>
                        <input type="text" id="email" name="email" placeholder="Nouvel email"/>
                    </div>
                    <input type="submit" value="Valider les changements"/>
            </form>
    </div>
</div>