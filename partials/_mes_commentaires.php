<div class="mon_compte">
    <div class="section">
        <p class="valid">
            <?php 
                if(isset($_SESSION['VALIDATE_MESSAGE_DELETE_COMMENTAIRE'])) {
                    echo $_SESSION['VALIDATE_MESSAGE_DELETE_COMMENTAIRE'];
                    $_SESSION['VALIDATE_MESSAGE_DELETE_COMMENTAIRE'] = '';
                }
            ?>
        </p>
        <p class="error">
            <?php 
                if(isset($_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'])) {
                    echo $_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'];
                    $_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'] = '';
                }
            ?>
        </p>
        <p class="valid">
            <?php 
                if(isset($_SESSION['VALIDATE_MESSAGE_UPDATE_COMMENTAIRE'])) {
                    echo $_SESSION['VALIDATE_MESSAGE_UPDATE_COMMENTAIRE'];
                    $_SESSION['VALIDATE_MESSAGE_UPDATE_COMMENTAIRE'] = '';
                }
            ?>
        </p>
        <p class="error">
            <?php 
                if(isset($_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'])) {
                    echo $_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'];
                    $_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'] = '';
                }
            ?>
        </p>
        <div class="section_commentaires_all">
            <?php foreach($commentaires as $commentaire): ?>
                <div class="card">
                    <?php include(__dir__ . '/_card_commentaire.php'); ?>
                    <div class="btn">
                        <a href="/form_update_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/></svg></a>
                        <a href="/blog.php?id=<?php echo $commentaire['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></a>
                        <a href="/script/script_delete_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>