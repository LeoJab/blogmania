<?php
require_once(__dir__ . '/header.php');

if(!isset($_SESSION['LOGGED_USER'])) {
    header ('Location: /add_blog_no_log.php');
}
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Création de votre Blog</h2>
<form class="formulaire" action="#" method="POST">
    <div>
        <div class="label_input">
            <label for="titre">Titre du Blog</label>
            <input type="text" name="titre" id="titre">
            <label for="image">Image de présentation de votre Blog</label>
            <input type="file" name="image" id="image">
            <span class="error" id="errImg"></span>
            <img id="preview" src="" alt="Prévisualisation de l'image">
            <label for="contenu">Contenu de votre Blog</label>
            <textarea name="contenu" id="contenu"></textarea>
        </div>
    </div>
    <button class="btn_gris" type="submit">Créer mon Blog</button>
</form>
<?php
require_once(__dir__ . '/footer.php');
?>