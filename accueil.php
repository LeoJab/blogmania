<?php
require_once(__dir__ . "/header.php");

$queryBlogPlusPop = ('SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_Blog = Likes.Id_blog GROUP BY Blog.Id_blog HAVING COUNT(Likes.Id_blog) >= (SELECT COUNT(Likes.Id_Blog) / COUNT(DISTINCT Likes.Id_Blog) FROM Likes) ORDER BY RAND() LIMIT 1');
$selectBlogPlusPop = $mysqlClient->prepare($queryBlogPlusPop);
$selectBlogPlusPop->execute();
$blogPlusPop = $selectBlogPlusPop->fetchAll();

$queryTopBlog = ('SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE is_valid IS NOT FALSE GROUP BY Likes.Id_Blog ORDER BY COUNT(Likes.Id_blog) DESC LIMIT 9');
$selectTopBlog = $mysqlClient->prepare($queryTopBlog);
$selectTopBlog->execute();
$topBlogs = $selectTopBlog->fetchAll();

$queryCategorie = ('SELECT * FROM Categorie');
$selectCategorie = $mysqlClient->prepare($queryCategorie);
$selectCategorie->execute();
$categories = $selectCategorie->fetchAll();

$queryBlogRecent = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE ORDER BY date_ajout ASC LIMIT 9;');
$selectBlogRecent = $mysqlClient->prepare($queryBlogRecent);
$selectBlogRecent->execute();
$blogRecents = $selectBlogRecent->fetchAll();
?>

<div class="accueil_top">
    <div class="accueil_blog_pop">
        <p>Blog Populaire</p>
        <?php foreach($blogPlusPop as $blog): ?>
            <?php include_once(__dir__ . '/partials/_card_blog.php'); ?>
        <?php endforeach; ?>
    </div>
    <div class="accueil_titre">
        <div>
            <h2>Créer votre blog avec</h2>
            <h1>BlogMania</h1>
        </div>
        <a class="btn_create" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
            CRÉER MON BLOG
        </a>
    </div>
</div>
<?php include(__dir__ . '/partials/_top_blog.php') ?>
<?php include(__dir__ . '/partials/_categorie.php') ?>
<?php include(__dir__ . '/partials/_blog_recent.php') ?>