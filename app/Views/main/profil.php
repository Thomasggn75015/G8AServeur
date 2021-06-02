<?php
    if(isset($_GET["error"])){
        echo("
            <h4 class=message-systeme>" . $_GET["error"] . "</h4>
        ");
    }
    if(isset($_GET['succes'])){
        echo("
            <h4 class=message-systeme>" . $_GET["succes"] . "</h4>
        ");
    }
?>
<div class="bloc-profil">
    <div class="profil_form-bloc">
            <h1>Modification du profil</h1>
            <form class="profil_form-modif" method="POST" action="/profil/modif">
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
        ?>
    </div>
    <div class="tableau-recherche">
        <?php
        if(isset($params)){
            echo ('
                    <table class="tableau_resultats-recherche">
                    <colgroup span="8" class="columns"></colgroup>
                        <tr>
                            <th>Role</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Nom du coach</th>
                            <th>Nom d\'utilisateur</th>
                            <th>Email</th>
                            <th>Date de naissance</th>
                            <th></th>
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
                        <td class="delete-bouton">
                        ');
                        if($_SESSION["user_role"] == 'admin'){
                        echo '
                        <form action="/deleteUser" method="POST">
                        <input type="submit" name="' . $row['pseudo'] . '" value="Supprimer"></input>
                        </form>
                        ';
                        }
                    echo('</td>
                        
                        </tr>
                    ');
                }
                echo('
                        <form action="/addUser" method="POST">
                            <td>
                                <select name="user_role">
                                    <option value="sportif">Sportif</option>
                                    <option value="coach">Coach</option>
                                    <option value="admin">Administrateur</option>
                                </select>
                            </td>
                            <td><input type="text" name="firstname" placeholder="prenom"></input></td>
                            <td><input type="text" name="lastname" placeholder="nom"></input></td>
                            <td><input type="text" name="coachname" placeholder="nom du coach"></input></td>
                            <td><input type="text" name="pseudo" placeholder="pseudo"></input></td>
                            <td><input type="text" name="email" placeholder="adresse mail"></input></td>
                            <td><input type="text" name="birthdate" placeholder="date de naissance"></input></td>
                            <td><input type="submit" name="ajouter" value="Ajouter"></input></td>
                        </form>
                        </tbody>
                    </table>
                ');
        }
        ?>
    </div>
</div>