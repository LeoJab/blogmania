<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idBlog = $_GET['idBlog'];

// Si la variable $idBlog est vide, message d'erreur et renvois vers la page blogs
if(empty($idBlog)) {
    $_SESSION['ERROR_MESSAGE_SIGNAL_BLOG'] = "Le blog n'existe pas";
    header('Location: /../admin/moderation.php?page=blogs');
    exit();
} else {
    // Modification de is_valid en FALSE
    $querySignalBlog = ('UPDATE Blog SET is_valid = 0 WHERE Id_Blog = :idBlog');
    $signalBlog = $mysqlClient->prepare($querySignalBlog);
    $signalBlog->execute([
        'idBlog' => $idBlog,
    ]);

    $_SESSION['VALIDATE_MESSAGE_SIGNAL_BLOG'] = 'Le blog est signalé';

    header('Location: /../admin/moderation.php?page=blogs');
    exit();
}