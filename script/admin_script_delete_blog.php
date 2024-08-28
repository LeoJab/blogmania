<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idBlog = $_GET['idBlog'];

// Si la variable $idBlog est vide, message d'erreur et renvois vers la page blogs
if(empty($idBlog)) {
    $_SESSION['ERROR_MESSAGE_DELETE_BLOG'] = "Le blog n'existe pas";
    header('Location: /../admin/admin.php?page=blogs');
    exit();
} else {
    // Suppresion des commentaires du blog
    $queryDeleteComs = 'DELETE FROM Commentaire WHERE Id_Blog = :idBlog';
    $deleteComs = $mysqlClient->prepare($queryDeleteComs);
    $deleteComs->execute([
        'idBlog' => $intIdBlog,
    ]);

    // Suppresion des likes du blog
    $queryDeleteLikes = 'DELETE FROM Likes WHERE Id_Blog = :idBlog';
    $deleteLikes = $mysqlClient->prepare($queryDeleteLikes);
    $deleteLikes->execute([
        'idBlog' => $intIdBlog,
    ]);

    // Suppresion du blog
    $queryDeleteBlog = 'DELETE FROM Blog WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog';
    $deleteBlog = $mysqlClient->prepare($queryDeleteBlog);
    $deleteBlog->execute([
        'idUti' => $idUti,
        'idBlog' => $intIdBlog,
    ]);

    $_SESSION['VALIDATE_MESSAGE_DELETE_BLOG'] = 'Le blog est supprimé';

    header('Location: /../admin/admin.php?page=blogs');
    exit();
}