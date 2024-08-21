<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idBlog = $_POST['id_blog'];
$idUti = $_SESSION['LOGGED_USER']['idUti'];

if(!preg_match('#^[0-9]$#', $idBlog) && !is_numeric($idUti)) {
    $_SESSION['LIKE_ERROR_MESSAGE'] = "Impossible d'aimer ce blog.";

    header("Location: /../blog.php?id=$idBlog");
    exit();
}

$intIdBlog = intval($idBlog);

$queryInsertLike = 'DELETE FROM Likes WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog';
$insertLike = $mysqlClient->prepare($queryInsertLike);
$insertLike->execute([
    'idUti' => $idUti,
    'idBlog' => $intIdBlog,
]);

$_SESSION['LIKE_ERROR_MESSAGE'] = "";

header("Location: /../blog.php?id=$idBlog");
exit();