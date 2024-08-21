<?php
require_once(__dir__ . '/header.php');

$idBlog = $_GET['id'];
$idUti = $_SESSION['LOGGED_USER']['idUti'];

// QUERY LE BLOG SELON L'ID
$querySelectBlog = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND Id_Blog = :id;');
$selectSelectBlog = $mysqlClient->prepare($querySelectBlog);
$selectSelectBlog->execute([
    'id' => $idBlog,
]);
$blog = $selectSelectBlog->fetch(PDO::FETCH_ASSOC);

// QUERY INFORMATIONS DU CREATEUR DU BLOG
$querySelectInfoUti = ('SELECT Utilisateur.* FROM Utilisateur INNER JOIN Blog ON Blog.Id_utilisateur = Utilisateur.Id_utilisateur WHERE Blog.Id_blog = :id;');
$selectSelectInfoUti = $mysqlClient->prepare($querySelectInfoUti);
$selectSelectInfoUti->execute([
    'id' => $idBlog,
]);
$infoUti = $selectSelectInfoUti->fetch();

// QUERY COMMENTAIRE CORESPONDANT AU BLOG
$querySelectCommentaire = ('SELECT Commentaire.*, utilisateur.* FROM Commentaire INNER JOIN utilisateur ON utilisateur.id_utilisateur = commentaire.Id_Utilisateur WHERE commentaire.is_valid IS NOT FALSE AND id_Blog = :id ORDER BY Commentaire.Date_publication ASC;');
$selectCommentaire = $mysqlClient->prepare($querySelectCommentaire);
$selectCommentaire->execute([
    'id' => $idBlog,
]);
$commentaires = $selectCommentaire->fetchAll();

// QUERY COMPTEUR DE COMMENTAIRE SUR LE BLOG
$querySelectCompteurCommentaire = ('SELECT COUNT(Commentaire.Id_commentaire) as "compteur" FROM Commentaire WHERE is_valid IS NOT FALSE AND id_Blog = :id;');
$selectCompteurCommentaire = $mysqlClient->prepare($querySelectCompteurCommentaire);
$selectCompteurCommentaire->execute([
    'id' => $idBlog,
]);
$compteurCommentaires = $selectCompteurCommentaire->fetch();

// VERIFIACTION LIKE
$isLiked = true;
$querySelectLikes = ('SELECT id_likes FROM Likes WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog');
$selectLikes = $mysqlClient->prepare($querySelectLikes);
$selectLikes->execute([
    'idUti' => $idUti,
    'idBlog' => $idBlog,
]);
$likes = $selectLikes->fetch();

if($likes == NULL) {
    $isLiked = false;
}
?>

<div class="blog">
    <img src="<?php echo $blog['image']; ?>" alt="Image du Blog">
    <div>
        <?php if($isLiked == false): ?>
            <div>
                <form class="form_like" action="/script/script_add_like.php" method="POST">
                    <input type="hidden" name="id_blog" value="<?php echo $blog['Id_Blog'] ?>">
                    <button type="submit"><svg class="blog_like" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></button>
                </form>
            </div>
        <?php endif ?>
        <?php if($isLiked == true): ?>
            <div>
                <form class="form_like" action="/script/script_remove_like.php" method="POST">
                    <input type="hidden" name="id_blog" value="<?php echo $blog['Id_Blog'] ?>">
                    <button type="submit"><svg class="blog_liked" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></button>
                </form>
            </div>
        <?php endif ?>
    </div>
    <?php if(isset($_SESSION['LIKE_ERROR_MESSAGE'])): ?>
           <p class="error"><?php echo $_SESSION['LIKE_ERROR_MESSAGE']; ?></p>
    <?php endif; ?>
    <h1 class="titre_64_black"><?php echo $blog['titre']; ?></h1>
    <p class="text_22_black"><?php echo $blog['contenu']; ?></p>
    <div class="info">
        <p class="text_18_black_light">Publié par <?php echo $infoUti['pseudo']; ?></p>
        <p class="text_18_black_light">Le <?php echo $blog['date_ajout']; ?></p>
    </div>
</div>
<div>
    <h3 class="section_titre titre_32_black">Commentaire (<?php echo $compteurCommentaires['compteur'] ?>)</h3>
    <div class="blog_commentaires">
        <div class="publie">
            <p class="text_26_black">Publié un commentaire</p>
            <form action="#" method="POST">
                <div class="titre_contenu">
                    <input type="text" name="titre" placeholder="Titre du commentaire..">
                    <span></span>
                    <textarea class='contenu' name="contenu" placeholder="Votre commentaire.."></textarea>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
        <?php foreach($commentaires as $commentaire): ?>
            <?php include(__dir__ . '/partials/_card_commentaire.php') ?>
        <?php endforeach ?>
    </div>
</div>

<?php require_once(__dir__ . '/footer.php') ?>