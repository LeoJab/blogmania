<div class="espace_mod">
    <h2 class="titre_64_black">Utilisateurs (<?php echo $nbrUtilisateurs['count'] ?>)</h2>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'])) {
                echo $_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'];
                $_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'])) {
                echo $_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'];
                $_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'])) {
                echo $_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'];
                $_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'])) {
                echo $_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'];
                $_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($utilisateurs as $utilisateur): ?>
                <tr>
                    <th><?php echo $utilisateur['Id_Utilisateur'] ?></td>
                    <td><img class="espace_mod_img_utilisateur" src="/../ASSET/img/user/<?php echo $utilisateur['image'] ?>"></td>
                    <td><?php echo $utilisateur['nom'] ?></td>
                    <td><?php echo $utilisateur['prenom'] ?></td>
                    <td><?php echo $utilisateur['pseudo'] ?></td>
                    <td class="actions">
                        <a href="/../script/admin_script_valide_utilisateur.php?idUti=<?php echo $utilisateur['Id_Utilisateur'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg></a>
                        <a href="/../script/admin_script_valide_utilisateur.php?idUti=<?php echo $utilisateur['Id_Utilisateur'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>