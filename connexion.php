<?php
    include_once(__dir__ . '/header.php')
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Connexion</h2>
<form class="formulaire" action="#" method="POST">
    <div class="label_input">
        <label for="email_pseudo">Pseudo ou Email</label>
        <input type="text" name="email_pseudo">
        <label for="password">Mot de passe</label>
        <input type="text" name="password">
    </div>
    <button class="btn_gris" type="submit">Connexion</button>
</form>
<?php
    include_once(__dir__ . '/footer.php')
?>