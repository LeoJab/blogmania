<?php
require_once(__dir__ . '/mod_header.php');

$page = $_GET['page'];

// Si le role n'est pas ROLE_ADMIN, affichage d'une erreur 404
if($_SESSION['LOGGED_USER']['role'] != 'ROLE_ADMIN') {
    header('Location: /../404.php');
    exit();
}

// Comptage des blogs où is_valide == FALSE
$sqlQuery = 'SELECT COUNT(id_blog) AS count FROM blog WHERE is_valid IS FALSE';
$selectNbrBlogs = $mysqlClient->prepare($sqlQuery);
$selectNbrBlogs->execute();
$nbrBlogs = $selectNbrBlogs->fetch();

// Comptage des commentaires où is_valide == FALSE
$sqlQuery = 'SELECT COUNT(id_commentaire) AS count FROM Commentaire WHERE is_valid IS FALSE';
$selectNbrCommentaires = $mysqlClient->prepare($sqlQuery);
$selectNbrCommentaires->execute();
$nbrCommentaires = $selectNbrCommentaires->fetch();

// Comptage des utilisateurs où is_valide == FALSE
$sqlQuery = 'SELECT COUNT(id_utilisateur) AS count FROM Utilisateur WHERE is_valid IS FALSE';
$selectNbrCommentaires = $mysqlClient->prepare($sqlQuery);
$selectNbrCommentaires->execute();
$nbrUtilisateurs = $selectNbrCommentaires->fetch();

?>

<div id="mon_compte">
    <h1 class="titre_90_blue">BlogMania</h1>
    <h2 class="titre_64_black">Espace Administrateur</h2>
    <ul class="separation">
        <li><a class="text_30_black_light" href="/admin/admin.php?page=blogs">Blogs (<?php echo $nbrBlogs['count'] ?>)</a></li>
        <li><a class="text_30_black_light" href="/admin/admin.php?page=commentaires">Commentaires (<?php echo $nbrCommentaires['count'] ?>)</a></li>
        <li><a class="text_30_black_light" href="/admin/admin.php?page=utilisateurs">Utilisateurs (<?php echo $nbrUtilisateurs['count'] ?>)</a></li>
    </ul>
</div>

<?php
switch($page) {
    case 'blogs':
        // Recupération des blogs où is_valid is FALSE
        $sqlQuery = "SELECT Id_Blog, image, CONCAT(LEFT(titre, 60), '...') AS titre, CONCAT(LEFT(contenu, 110), '...') AS contenu FROM Blog WHERE is_valid IS FALSE";
        $selectBlog = $mysqlClient->prepare($sqlQuery);
        $selectBlog->execute();
        $blogs = $selectBlog->fetchAll();
        
        include(__dir__ . '/../partials/_admin_blogs.php');
        break;
    case 'commentaires':
        // Recupération des commentaires où is_valid is FALSE
        $sqlQuery = "SELECT Id_Commentaire, Id_Blog, CONCAT(LEFT(titre, 60), '...') AS titre, CONCAT(LEFT(contenu, 110), '...') AS contenu FROM Commentaire WHERE is_valid IS FALSE";
        $selectCommentaires = $mysqlClient->prepare($sqlQuery);
        $selectCommentaires->execute();
        $commentaires = $selectCommentaires->fetchAll();
        
        include(__dir__ . '/../partials/_admin_commentaires.php');
        break;
    case 'utilisateurs':
        // Recupération des utilisateurs où is_valid is FALSE
        $sqlQuery = "SELECT * FROM Utilisateur WHERE is_valid IS FALSE AND role = 'ROLE_USER'";
        $selectUtilisateurs = $mysqlClient->prepare($sqlQuery);
        $selectUtilisateurs->execute();
        $utilisateurs = $selectUtilisateurs->fetchAll(PDO::FETCH_ASSOC);
        
        include(__dir__ . '/../partials/_admin_utilisateurs.php');
        break;
    default:
        header('Location: 404.php');
        break;
};
?>