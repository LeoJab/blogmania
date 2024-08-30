<?php
session_start();

if(!isset($_SESSION['LOGGED_USER'])) {
    header ('Location: /connexion.php');
    exit();
}

require_once(__dir__ . '/header.php');
?>

<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Création de votre Blog</h2>
<form class="formulaire" action="/script/script_add_blog.php" method="POST" enctype="multipart/form-data">
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_ADD_BLOG'])) {
                echo $_SESSION['VALIDATE_MESSAGE_ADD_BLOG'];
                $_SESSION['VALIDATE_MESSAGE_ADD_BLOG'] = '';
            }
        ?>
    </p>
    <div>
        <div class="label_input">
            <label for="titre">Titre du Blog</label>
            <input type="text" name="titre" id="titre" maxlenght="50" required>
            <label for="categorie">Selectionner une catégorie:</label>
            <select name="categorie" id="categorie" required>
                <option value="">--Selectionner une catégorie--</option>
                <option value="Cinéma & Culture">Cinéma & Culture</option>
                <option value="Musique">Musique</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Déco">Déco</option>
                <option value="Beauté & santé">Beauté & santé</option>
                <option value="Mode">Mode</option>
                <option value="Jeux & Jeux vidéo">Jeux & Jeux vidéo</option>
                <option value="High-tech et sciences">High-tech et sciences</option>
                <option value="Sport">Sport</option>
            </select>
            <label for="image">Image de présentation de votre Blog</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/webp" required>
            <span class="error" id="errImg"></span>
            <img id="preview" src="" alt="Prévisualisation de l'image">
            <label for="contenu">Contenu de votre Blog</label>
            <textarea name="contenu" id="contenu" maxlenght="500" required></textarea>
        </div>
    </div>
    <button class="btn_gris" type="submit">Créer mon Blog</button>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_ADD_BLOG'])) {
                echo $_SESSION['ERROR_MESSAGE_ADD_BLOG'];
                $_SESSION['ERROR_MESSAGE_ADD_BLOG'] = '';
            }
        ?>
    </p>
</form>
<?php
require_once(__dir__ . '/footer.php');
?>