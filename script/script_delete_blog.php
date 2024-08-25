<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idBlog = $_GET['idBlog'];

if(!preg_match('#^[0-9]$#', $idBlog) && !is_numeric($idUti)) {
    $_SESSION['ERROR_MESSAGE_DELETE_BLOG'] = "Impossible de supprimer ce blog.";

    header("Location: /../mon_compte.php?page=mes_blogs");
    exit();
}

$intIdBlog = intval($idBlog);

// Vérification que le blog existe et que l'utilisateur soit bien le créateur
$selectBlog = $mysqlClient->prepare('SELECT * FROM Blog WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog');
$selectBlog->execute([
    'idUti' => $idUti,
    'idBlog' => $intIdBlog,
]);
$verifBlog = $selectBlog->fetch();

if($verifBlog == NULL) {
    $_SESSION['ERROR_MESSAGE_DELETE_BLOG'] = "Le blog n'existe pas ou vous n'êtes pas le créateur";

    header("Location: /../mon_compte.php?page=mes_blogs");
    exit();
} else {
    $queryDeleteComs = 'DELETE FROM Commentaire WHERE Id_Blog = :idBlog';
    $deleteComs = $mysqlClient->prepare($queryDeleteComs);
    $deleteComs->execute([
        'idBlog' => $intIdBlog,
    ]);

    $queryDeleteLikes = 'DELETE FROM Likes WHERE Id_Blog = :idBlog';
    $deleteLikes = $mysqlClient->prepare($queryDeleteLikes);
    $deleteLikes->execute([
        'idBlog' => $intIdBlog,
    ]);

    $queryDeleteBlog = 'DELETE FROM Blog WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog';
    $deleteBlog = $mysqlClient->prepare($queryDeleteBlog);
    $deleteBlog->execute([
        'idUti' => $idUti,
        'idBlog' => $intIdBlog,
    ]);

    $_SESSION['VALIDATE_MESSAGE_DELETE_BLOG'] = "Votre blog a bien été supprimer !";

    header("Location: /../mon_compte.php?page=mes_blogs");
    exit();
}