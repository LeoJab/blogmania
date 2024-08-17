<form class="formulaire" action="#" method="POST">
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
        <input type="text" name="email" id="email" value="<?php echo $utiInfo['email'] ?>">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>
    <div class="file">
        <label for="image">Ajouter une photo de profile</label>
        <span class="error" id="errImg"></span>
        <input type="file" name="image" id="image" value="<?php echo $utiInfo['image'] ?>">
        <img class="pp" id="preview" src="<?php echo $utiInfo['image'] ?>" alt="Prévisualisation de l'image">
    </div>
    <button class="btn_gris" type="submit">Modifier</button>
</form>