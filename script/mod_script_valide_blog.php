<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idBlog = $_GET['idBlog'];

// Si la variable $idBlog est vide, message d'erreur et renvois vers la page blogs
if(empty($idBlog)) {
    $_SESSION['ERROR_MESSAGE_VALIDE_BLOG'] = "Le blog n'existe pas";
    header('Location: /../admin/moderation.php?page=blogs');
    exit();
} else {
    // Modification de is_valid en TRUE
    $queryValideBlog = ("UPDATE Blog SET is_valid = 1 WHERE Id_Blog = :idBlog");
    $valideBlog = $mysqlClient->prepare($queryValideBlog);
    $valideBlog->execute([
        'idBlog' => $idBlog,
    ]);

    $_SESSION['VALIDATE_MESSAGE_VALIDE_BLOG'] = "Le blog est validé";

    header('Location: /../admin/moderation.php?page=blogs');
    exit();
}