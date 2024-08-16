<?php
require_once(__dir__ . '/header.php')
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Inscription</h2>
<form class="formulaire" action="#" method="POST">
    <div class="label_input">
        <div class="double">
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom">
            </div>
            <div>
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom">
            </div>
        </div>
        <div class="double">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo">
            </div>
            <div>
                <label for="ddn">Date de naissance</label>
                <input type="date" name="ddn">
            </div>
        </div>
        <label for="email">Email</label>
        <input type="text" name="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" name="password_confirm">
    </div>
    <button class="btn_gris" type="submit">Inscription</button>
</form>
<?php
require_once(__dir__ . '/footer.php')
?>