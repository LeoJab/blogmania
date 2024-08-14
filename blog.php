<?php
require_once(__dir__ . '/header.php');

$idBlog = $_GET['id'];

// QUERY LE BLOG SELON L'ID
$querySelectBlog = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND Id_Blog = :id;');
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