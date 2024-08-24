<?php
function commentaireIdBlog($idBlog) {
    global $mysqlClient;
    // QUERY COMMENTAIRE CORESPONDANT AU BLOG
    $querySelectCommentaire = ('SELECT Commentaire.*, utilisateur.* FROM Commentaire INNER JOIN utilisateur ON utilisateur.id_utilisateur = commentaire.Id_Utilisateur WHERE commentaire.is_valid IS NOT FALSE AND id_Blog = :id ORDER BY Commentaire.Date_publication ASC;');
    $selectCommentaire = $mysqlClient->prepare($querySelectCommentaire);
    $selectCommentaire->execute([
        'id' => $idBlog,
    ]);
    $commentaires = $selectCommentaire->fetchAll();

    foreach($commentaires as $commentaire) {
        include(__dir__ . '/partials/_card_commentaire.php');
    };
};

function blog($idBlog) {
    global $mysqlClient;
    // QUERY BLOG SELON L'ID EN PARAMETRE
    $querySelectBlog = ('SELECT * FROM Blog WHERE Id_Blog = :id;');
    $selectSelectBlog = $mysqlClient->prepare($querySelectBlog);
    $selectSelectBlog->execute([
        'id' => $idBlog,
    ]);
    $blog = $selectSelectBlog->fetch();

    // QUERY INFORMATIONS DU CREATEUR DU BLOG
    $querySelectInfoUti = ('SELECT Utilisateur.* FROM Utilisateur INNER JOIN Blog ON Blog.Id_utilisateur = Utilisateur.Id_utilisateur WHERE Blog.Id_blog = :id;');
    $selectSelectInfoUti = $mysqlClient->prepare($querySelectInfoUti);
    $selectSelectInfoUti->execute([
        'id' => $idBlog,
    ]);
    $infoUti = $selectSelectInfoUti->fetch();
    ?>
    <div class="blog">
        <img src="<?php echo $blog['image']; ?>" alt="Image du Blog">
        <h1 class="titre_64_black"><?php echo $blog['titre']; ?></h1>
        <p class="text_22_black"><?php echo $blog['contenu']; ?></p>
        <div class="info">
            <p class="text_18_black_light">Publié par <?php echo $infoUti['pseudo']; ?></p>
            <p class="text_18_black_light">Le <?php echo $blog['date_ajout']; ?></p>
        </div>
    </div>
    <?php
};

function editBlog($idBlog) {
    global $mysqlClient;
    // QUERY BLOG SELON L'ID EN PARAMETRE
    $querySelectBlog = ('SELECT * FROM Blog WHERE Id_Blog = :id;');
    $selectSelectBlog = $mysqlClient->prepare($querySelectBlog);
    $selectSelectBlog->execute([
        'id' => $idBlog,
    ]);
    $blog = $selectSelectBlog->fetch();
    ?>
    <form class="formulaire" action="#" method="POST">
        <div>
            <div class="label_input">
                <label for="titre">Titre du Blog</label>
                <input type="text" name="titre" id="titre" value="<?php echo $blog['titre'] ?>">
                <label for="image">Image de présentation de votre Blog</label>
                <input type="file" name="image" id="image" value="<?php echo $blog['image'] ?>">
                <span class="error" id="errImg"></span>
                <img id="preview" src="<?php echo $blog['image'] ?>" alt="Prévisualisation de l'image">
                <label for="contenu">Contenu de votre Blog</label>
                <textarea name="contenu" id="contenu"><?php echo $blog['contenu'] ?></textarea>
            </div>
        </div>
        <button class="btn_gris" type="submit">Modifier mon Blog</button>
    </form>
    <?php
};

function editCommentaire($idCommentaire) {
    global $mysqlClient;
    // QUERY COMMENTAIRE SELON L'ID EN PARAMETRE
    $querySelectCommentaire = ('SELECT * FROM Commentaire WHERE Id_Commentaire = :idCommentaire;');
    $selectSelectCommentaire = $mysqlClient->prepare($querySelectCommentaire);
    $selectSelectCommentaire->execute([
        'idCommentaire' => $idCommentaire,
    ]);
    $commentaire = $selectSelectCommentaire->fetch();
    ?>
    <div class="blog_commentaires">
        <div class="publie">
            <form action="/script/script_update_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>" method="POST">
                <div class="titre_contenu">
                    <input type="text" name="titre" placeholder="Titre du commentaire.." value="<?php echo $commentaire['titre'] ?>">
                    <span></span>
                    <textarea class='contenu' name="contenu" placeholder="Votre commentaire.."><?php echo $commentaire['contenu'] ?></textarea>
                </div>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>
    <?php
};
?>