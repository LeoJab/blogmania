<?php
require_once(__dir__ . '/header.php')
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Inscription</h2>
<form class="formulaire" action="/script/script_inscription.php" method="POST" enctype="multipart/form-data">
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_INSCRIPTION'])) {
                echo $_SESSION['ERROR_MESSAGE_INSCRIPTION'];
                $_SESSION['ERROR_MESSAGE_INSCRIPTION'] = '';
            }
        ?>
    </p>
    <div class="label_input">
        <div class="double">
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="name" maxlenght="40" required>
            </div>
            <div>
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" maxlenght="40" required>
            </div>
        </div>
        <div class="double">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" maxlenght="60" required>
            </div>
            <div>
                <label for="ddn">Date de naissance</label>
                <input class="date" type="date" name="ddn" id="ddn" required>
            </div>
        </div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" maxlenght="100" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <label for="confirm_password">Confirmation du mot de passe</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </div>
    <div class="file">
        <label for="image">Ajouter une photo de profile</label>
        <span class="error" id="errImg"></span>
        <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/webp" required>
        <img class="pp" id="preview" src="" alt="Prévisualisation de l'image">
    </div>
    <button class="btn_gris" type="submit">Inscription</button>
    <a class="text_16_black_light" href="/connexion.php">Déja un compte ?</a>
</form>
<?php
require_once(__dir__ . '/footer.php')
?>