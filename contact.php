<?php
require_once(__dir__ . '/header.php')
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Prendre contact</h2>
<form class="formulaire" action="#" method="POST">
    <div>
        <div class="label_input">
            <label for="email">Votre Email</label>
            <input type="text" name="email" id="email">
            <label for="titre">Intitulé de votre demande</label>
            <input type="text" name="titre" id="titre">
            <label for="demande">Votre demande</label>
            <textarea name="demande" id="demande"></textarea>
        </div>
    </div>
    <button class="btn_gris" type="submit">Envoyer</button>
</form>
<?php
require_once(__dir__ . '/footer.php')
?>