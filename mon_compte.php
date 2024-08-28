<?php
require_once(__dir__ . '/header.php');

$page = $_GET['page'];
$idUti = $_SESSION['LOGGED_USER']['idUti'];

// Nombre de blogs de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_blog) AS count FROM blog WHERE id_utilisateur = :idUti';
$selectNbrBlogs = $mysqlClient->prepare($sqlQuery);
$selectNbrBlogs->execute([
    'idUti' => $idUti,
]);
$nbrBlogs = $selectNbrBlogs->fetch();

// Nombre de blogs likés de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_blog) AS count FROM Likes WHERE id_utilisateur = :idUti';
$selectNbrBlogsLikes = $mysqlClient->prepare($sqlQuery);
$selectNbrBlogsLikes->execute([
    'idUti' => $idUti,
]);
$nbrBlogsLikes = $selectNbrBlogsLikes->fetch();

// Nombre de commentaires de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_commentaire) AS count FROM Commentaire WHERE id_utilisateur = :idUti';
$selectNbrCommentaires = $mysqlClient->prepare($sqlQuery);
$selectNbrCommentaires->execute([
    'idUti' => $idUti,
]);
$nbrCommentaires = $selectNbrCommentaires->fetch();

// Selection des informations de l'utilisateur
$sqlQuery = 'SELECT is_valid FROM Utilisateur WHERE id_utilisateur = :idUti AND is_valid = FALSE';
$selectUtiIsValid = $mysqlClient->prepare($sqlQuery);
$selectUtiIsValid->execute([
    'idUti' => $idUti,
]);
$utiIsValid = $selectUtiIsValid->fetch();
?>

<div id="mon_compte">
    <h1 class="titre_90_blue">BlogMania</h1>
    <h2 class="titre_64_black">Mon Compte</h2>
    <ul class="separation">
        <li><a class="text_30_black_light" href="/mon_compte.php?page=mes_informations">Mes Informations</a></li>
        <li><a class="text_30_black_light" href="/mon_compte.php?page=mes_blogs">Mes Blogs (<?php echo $nbrBlogs['count'] ?>)</a></li>
        <li><a class="text_30_black_light" href="/mon_compte.php?page=mes_blogs_likes">Mes Blogs Likés (<?php echo $nbrBlogsLikes['count'] ?>)</a></li>
        <li><a class="text_30_black_light" href="/mon_compte.php?page=mes_commentaires">Mes Commentaires (<?php echo $nbrCommentaires['count'] ?>)</a></li>
    </ul>
</div>

<?php if(isset($utiIsValid['is_valid'])):?>
    <p class="error">Votre compte est signalé, merci de modifier vos informations !</p>
<?php endif; ?>

<?php
switch($page) {
    case 'mes_informations':
        // Recupération des informations de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT * FROM Utilisateur WHERE id_utilisateur = :idUti';
        $selectUtiInfo = $mysqlClient->prepare($sqlQuery);
        $selectUtiInfo->execute([
            'idUti' => $idUti,
        ]);
        $utiInfo = $selectUtiInfo->fetch();

        include(__dir__ . '/partials/_mes_informations.php');
        break;
    case 'mes_blogs':
        // Recupération des blogs de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT * FROM Blog WHERE id_utilisateur = :idUti';
        $selectBlog = $mysqlClient->prepare($sqlQuery);
        $selectBlog->execute([
            'idUti' => $idUti,
        ]);
        $blogs = $selectBlog->fetchAll();
        
        include(__dir__ . '/partials/_mes_blogs.php');
        break;
    case 'mes_blogs_likes':
        // Recupération des blogs likés de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE Likes.Id_utilisateur = :idUti';
        $selectBlog = $mysqlClient->prepare($sqlQuery);
        $selectBlog->execute([
            'idUti' => $idUti,
        ]);
        $blogs = $selectBlog->fetchAll();
        
        include(__dir__ . '/partials/_mes_blogs_likes.php');
        break;
    case 'mes_commentaires':
        // Recupération des commentaires postés par l'utilisateur selon l'id récupérer en session
        $querySelectCommentaire = ('SELECT Commentaire.*, utilisateur.* FROM Commentaire INNER JOIN utilisateur ON utilisateur.id_utilisateur = commentaire.Id_Utilisateur WHERE commentaire.id_utilisateur = :idUti ORDER BY Commentaire.Date_publication ASC;');
        $selectCommentaire = $mysqlClient->prepare($querySelectCommentaire);
        $selectCommentaire->execute([
            'idUti' => $idUti,
        ]);
        $commentaires = $selectCommentaire->fetchAll();
        
        include(__dir__ . '/partials/_mes_commentaires.php');
        break;
    default:
        header('Location: 404.php');
        break;
};

require_once(__dir__ . '/footer.php');
?>