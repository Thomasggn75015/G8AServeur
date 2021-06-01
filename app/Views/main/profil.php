<?php 
    if(isset($params) && count($params) < 1){
        echo("
            <h4 class=message-systeme>" . $params["systeme"] . "</h4>
        ");
    }
?>
<div class="bloc-profil">
    <div class="profil_form-bloc">
            <h1>Modification du profil</h1>
            <form class="profil_form-modif" method="PUT" action="/profil">
                    <div class="profil_bloc-pseudonyme">
                        <h4 class="user-field"><?php echo 'Pseudonyme actuel : ' . $_SESSION["user_pseudo"]?></h4>
                        <label for="pseudo">Changer le pseudonyme :</label>
                        <input type="text" id="pseudo" name="pseudo" placeholder="Nouveau pseudo"/>
                    </div>
                    <br/>
                    <label for="mdp">Changer le mot de passe :</label>
                    <input type="text" id="mdp" name="mdp" placeholder="Nouveau mot de passe"/>
                    <div class="profil_bloc-email">
                        <h4 class="user-field"><?php echo 'Email actuel : ' . $_SESSION["user_mail"]?></h4>
                        <label for="email">Changer l'email</label>
                        <input type="text" id="email" name="email" placeholder="Nouvel email"/>
                    </div>
                    <br/>
                    <input type="submit" value="Valider les changements"/>
            </form>
    </div>
    <div id='recherche_utilisateur'>
        <?php
        if($_SESSION['user_role'] == 'coach' || $_SESSION['user_role'] == 'admin'){
            echo ('
            <form class="form-recherche" method="POST" action="/profil">
                <label for="critereSelect"><h5>Selon quel critère souhaitez-vous rechercher un utilisateur ?</h5></label>
                <select name="critereSelect" id="critereSelect">
                    <option value="pseudo">Nom d\'utilisateur</option>
                    <option value="email">Mail</option>
                    <option value="coachname">Nom du coach</option>
                    <option value="firstname">Prénom</option>
                    <option value="lastname">Nom</option>
                    <option value="birthdate">Date de naissance</option>
                </select>
                <label class="label-recherche"><h5>Entrer les critères de recherche d\'utilisateur</h5></label>
                <input type="text" name="searchEntry" placeholder="ex. Jean"/>
                <br/>
                <br/>
                <button type="submit">Rechercher</button>
                <br/>
                <br/>
            </form>
            ');
        }
        if(isset($params)){
            echo ('
                    <table class="tableau_resultats-recherche">
                    <colgroup span="7" class="columns"></colgroup>
                        <tr>
                            <th>Role</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Nom du coach</th>
                            <th>Nom d\'utilisateur</th>
                            <th>Email</th>
                            <th>Date de naissance</th>
                        </tr>
            ');
                foreach($params as $row){
                    echo('
                        <td> ' . $row["user_role"] . ' </td>
                        <td> ' . $row["firstname"] . ' </td>
                        <td> ' . $row["lastname"] . ' </td>
                        <td> ' . $row["coachname"] . ' </td>
                        <td> ' . $row["pseudo"] . ' </td>
                        <td> ' . $row["email"] . ' </td>
                        <td> ' . $row["birthdate"] . ' </td>
                    ');
                }
                echo('
                            </tr>
                        </tbody>
                    </table>
                ');
        }
        ?>
    </div>
</div>