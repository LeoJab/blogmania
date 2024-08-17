<?php
require_once(__dir__ . '/header.php');

$page = $_GET['page'];
$id = 1;

// Nombre de blogs de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_blog) AS count FROM blog WHERE id_utilisateur = :id';
$selectNbrBlogs = $mysqlClient->prepare($sqlQuery);
$selectNbrBlogs->execute([
    'id' => $id,
]);
$nbrBlogs = $selectNbrBlogs->fetch();

// Nombre de blogs likés de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_blog) AS count FROM Likes WHERE id_utilisateur = :id';
$selectNbrBlogsLikes = $mysqlClient->prepare($sqlQuery);
$selectNbrBlogsLikes->execute([
    'id' => $id,
]);
$nbrBlogsLikes = $selectNbrBlogsLikes->fetch();

// Nombre de commentaires de l'utilisateur
$sqlQuery = 'SELECT COUNT(id_commentaire) AS count FROM Commentaire WHERE id_utilisateur = :id';
$selectNbrCommentaires = $mysqlClient->prepare($sqlQuery);
$selectNbrCommentaires->execute([
    'id' => $id,
]);
$nbrCommentaires = $selectNbrCommentaires->fetch();
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

<?php
switch($page) {
    case 'mes_informations':
        // Recupération des informations de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT * FROM Utilisateur WHERE id_utilisateur = :id';
        $selectUtiInfo = $mysqlClient->prepare($sqlQuery);
        $selectUtiInfo->execute([
            'id' => $id,
        ]);
        $utiInfo = $selectUtiInfo->fetch();

        include(__dir__ . '/partials/_mes_informations.php');
        break;
    case 'mes_blogs':
        // Recupération des blogs de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT * FROM Blog WHERE id_utilisateur = :id';
        $selectBlog = $mysqlClient->prepare($sqlQuery);
        $selectBlog->execute([
            'id' => $id,
        ]);
        $blogs = $selectBlog->fetch();
        
        include(__dir__ . '/partials/_mes_blogs.php');
        break;
    case 'mes_blogs_likes':
        // Recupération des blogs likés de l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE Likes.Id_utilisateur = :id';
        $selectBlog = $mysqlClient->prepare($sqlQuery);
        $selectBlog->execute([
            'id' => $id,
        ]);
        $blogs = $selectBlog->fetch();
        
        include(__dir__ . '/partials/_mes_blogs_likes.php');
        break;
    case 'mes_commentaires':
        // Recupération des commentaires postés par l'utilisateur selon l'id récupérer en session
        $sqlQuery = 'SELECT * FROM Commentaire INNER JOIN Blog ON Commentaire.id_blog = Blog.id_blog WHERE commentaire.id_utilisateur = :id';
        $selectCommentaire = $mysqlClient->prepare($sqlQuery);
        $selectCommentaire->execute([
            'id' => $id,
        ]);
        $commentaires = $selectCommentaire->fetch();
        
        include(__dir__ . '/partials/_mes_commentaires.php');
        break;
    default:
        header('Location: 404.php');
        break;
};

require_once(__dir__ . '/footer.php');
?>