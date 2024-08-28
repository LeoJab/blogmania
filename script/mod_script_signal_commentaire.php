<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idCom = $_GET['idCom'];

// Si la variable $idClog est vide, message d'erreur et renvois vers la page blogs
if(empty($idCom)) {
    $_SESSION['ERROR_MESSAGE_SIGNAL_COMMENTAIRE'] = "Le commentaire n'existe pas";
    header('Location: /../admin/moderation.php?page=commentaires');
    exit();
} else {
    // Modification de is_valid en FALSE
    $querySignalCommentaire = ('UPDATE Commentaire SET is_valid = 0 WHERE Id_Commentaire = :idCom');
    $signalCommentaire = $mysqlClient->prepare($querySignalCommentaire);
    $signalCommentaire->execute([
        'idCom' => $idCom,
    ]);

    $_SESSION['VALIDATE_MESSAGE_SIGNAL_COMMENTAIRE'] = 'Le commentaire est signalé';

    header('Location: /../admin/moderation.php?page=commentaires');
    exit();
}