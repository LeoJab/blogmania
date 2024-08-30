<?php 
session_start();

require_once(__dir__ . '/header.php');

$idCategorie = $_GET['id'];

// QUERY INFO DE LA CATEGORIE
$queryCategorieInfo = ('SELECT nom FROM Categorie WHERE id_categorie = :id');
$selectCategorieInfo = $mysqlClient->prepare($queryCategorieInfo);
$selectCategorieInfo->execute([
    'id' => $idCategorie,
]);
$categorieInfo = $selectCategorieInfo->fetch();

// QUERY TOUTES LES CATEGORIES
$queryCategorie = ('SELECT * FROM Categorie');
$selectCategorie = $mysqlClient->prepare($queryCategorie);
$selectCategorie->execute();
$categories = $selectCategorie->fetchAll();

// QUERY TOP DES BLOGS DE LA CATEGORIE
$queryTopBlog = ('SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE is_valid IS NOT FALSE AND id_categorie = :id GROUP BY Likes.Id_Blog ORDER BY COUNT(Likes.Id_blog) DESC LIMIT 9;');
$selectTopBlog = $mysqlClient->prepare($queryTopBlog);
$selectTopBlog->execute([
    'id' => $idCategorie,
]);
$topBlogs = $selectTopBlog->fetchAll();

// QUERY LES BLOGS LES PLUS RECENTS DE LA CATEGORIE
$queryBlogRecent = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND id_categorie = :id ORDER BY date_ajout ASC;');
$selectBlogRecent = $mysqlClient->prepare($queryBlogRecent);
$selectBlogRecent->execute([
    'id' => $idCategorie,
]);
$blogRecents = $selectBlogRecent->fetchAll();

// QUERY TOUT LES BLOGS DE LA CATEGORIE
$queryBlogAll = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND id_categorie = :id;');
$selectBlogAll = $mysqlClient->prepare($queryBlogAll);
$selectBlogAll->execute([
    'id' => $idCategorie,
]);
$blogAll = $selectBlogAll->fetchAll();
?>

<div id="categorie">
    <h1 class="titre_64_black"><?php echo $categorieInfo['nom'] ?></h1>
    <?php include(__dir__ . '/partials/_categorie.php') ?>
    <?php include(__dir__ . '/partials/_top_blog.php') ?>
    <?php include(__dir__ . '/partials/_blog_recent.php') ?>
    <?php include(__dir__ . '/partials/_all_blog.php') ?>
</div>

<?php require_once(__dir__ . '/footer.php') ?>