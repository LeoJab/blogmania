<?php
require_once(__dir__ . '/header.php')
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Création de votre Blog</h2>
<form class="formulaire" action="#" method="POST">
    <div>
        <div class="label_input separation">
            <div class="double">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="name">
                </div>
                <div>
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>
            </div>
            <div class="double">
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo">
                </div>
                <div>
                    <label for="ddn">Date de naissance</label>
                    <input class="date" type="date" name="ddn" id="ddn">
                </div>
            </div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <label for="password_confirm">Confirmation du mot de passe</label>
            <input type="password_confirm" name="password_confirm" id="password_confirm">
        </div>
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
require_once(__dir__ . '/footer.php')
?>