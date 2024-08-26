<?php
    include_once(__dir__ . '/header.php');
?>
<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Connexion</h2>
<form class="formulaire" action="/script/script_connexion.php" method="POST" enctype='multipart/form-data'>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_LOGIN'])) {
                echo $_SESSION['ERROR_MESSAGE_LOGIN'];
                $_SESSION['ERROR_MESSAGE_LOGIN'] = '';
            }
        ?>
    </p>
    <div class="label_input">
        <label for="email">Email</label>
        <input type="text" name="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
    </div>
    <button class="btn_gris" type="submit">Connexion</button>
    <a class="text_16_black_light" href="/inscription.php">Pas de compte ?</a>
</form>
<?php
    include_once(__dir__ . '/footer.php')
?>