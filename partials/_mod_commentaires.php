<div class="espace_mod">
    <h2 class="titre_64_black">Commentaires (<?php echo $nbrCommentaires['count'] ?>)</h2>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_SIGNAL_COMMENTAIRE'])) {
                echo $_SESSION['VALIDATE_MESSAGE_SIGNAL_COMMENTAIRE'];
                $_SESSION['VALIDATE_MESSAGE_SIGNAL_COMMENTAIRE'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_SIGNAL_COMMENTAIRE'])) {
                echo $_SESSION['ERROR_MESSAGE_SIGNAL_COMMENTAIRE'];
                $_SESSION['ERROR_MESSAGE_SIGNAL_COMMENTAIRE'] = '';
            }
        ?>
    </p>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_VALIDE_COMMENTAIRE'])) {
                echo $_SESSION['VALIDATE_MESSAGE_VALIDE_COMMENTAIRE'];
                $_SESSION['VALIDATE_MESSAGE_VALIDE_COMMENTAIRE'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_VALIDE_COMMENTAIRE'])) {
                echo $_SESSION['ERROR_MESSAGE_VALIDE_COMMENTAIRE'];
                $_SESSION['ERROR_MESSAGE_VALIDE_COMMENTAIRE'] = '';
            }
        ?>
    </p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($commentaires as $commentaire): ?>
                <tr>
                    <th><?php echo $commentaire['Id_Commentaire'] ?></td>
                    <td><?php echo $commentaire['titre'] ?></td>
                    <td><?php echo $commentaire['contenu'] ?></td>
                    <td class="actions">
                        <a href="/../blog.php?id=<?php echo $commentaire['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></a>
                        <a href="/../script/mod_script_valide_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg></a>
                        <a href="/../script/mod_script_signal_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>