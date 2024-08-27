<form class="formulaire" action="/../script/script_update_utilisateur.php" method="POST" enctype="multipart/form-data">
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_UPDATE_UTILISATEUR'])) {
                echo $_SESSION['VALIDATE_MESSAGE_UPDATE_UTILISATEUR'];
                $_SESSION['VALIDATE_MESSAGE_UPDATE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'])) {
                echo $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'];
                $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'] = '';
            }
        ?>
    </p>
    <div class="label_input">
        <div class="double">
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="name" value="<?php echo $utiInfo['nom'] ?>">
            </div>
            <div>
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $utiInfo['prenom'] ?>">
            </div>
        </div>
        <div class="double">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value="<?php echo $utiInfo['pseudo'] ?>">
            </div>
            <div>
                <label for="ddn">Date de naissance</label>
                <input class="date" type="date" name="ddn" id="ddn" value="<?php echo $utiInfo['ddn'] ?>">
            </div>
        </div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $utiInfo['email'] ?>" readonly="readonly">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="file">
        <label for="image">Ajouter une photo de profile</label>
        <span class="error" id="errImg"></span>
        <input type="file" name="image" id="image" value="<?php echo $utiInfo['image'] ?>">
        <img class="pp" id="preview" src="/../ASSET/img/user/<?php echo $utiInfo['image'] ?>" alt="Prévisualisation de l'image">
    </div>
    <button class="btn_gris" type="submit">Modifier</button>
</form>