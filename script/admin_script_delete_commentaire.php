<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idCom = $_GET['idCom'];

// Si la variable $idClog est vide, message d'erreur et renvois vers la page blogs
if(empty($idCom)) {
    $_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'] = "Le commentaire n'existe pas";
    header('Location: /../admin/admin.php?page=commentaires');
    exit();
} else {
    // Modification de is_valid en FALSE
    $queryDeleteCommentaire = ('DELETE FROM Commentaire WHERE Id_Commentaire = :idCom');
    $deleteCommentaire = $mysqlClient->prepare($queryDeleteCommentaire);
    $deleteCommentaire->execute([
        'idCom' => $idCom,
    ]);

    $_SESSION['VALIDATE_MESSAGE_DELETE_COMMENTAIRE'] = 'Le commentaire est supprimé';

    header('Location: /../admin/admin.php?page=commentaires');
    exit();
}