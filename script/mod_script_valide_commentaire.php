<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idCom = $_GET['idCom'];

// Si la variable $idCom est vide, message d'erreur et renvois vers la page commentaires
if(empty($idCom)) {
    $_SESSION['ERROR_MESSAGE_VALIDE_COMMENTAIRE'] = "Le commentaire n'existe pas";
    header('Location: /../admin/moderation.php?page=commentaires');
    exit();
} else {
    // Modification de is_valid en TRUE
    $queryValideCommentaire = ("UPDATE Commentaire SET is_valid = 1 WHERE Id_Commentaire = :idCom");
    $valideCommentaire = $mysqlClient->prepare($queryValideCommentaire);
    $valideCommentaire->execute([
        'idCom' => $idCom,
    ]);

    $_SESSION['VALIDATE_MESSAGE_VALIDE_COMMENTAIRE'] = "Le commentaire est validé";

    header('Location: /../admin/moderation.php?page=commentaires');
    exit();
}