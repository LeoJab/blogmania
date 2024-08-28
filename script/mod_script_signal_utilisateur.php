<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idUti = $_GET['idUti'];

// Si la variable $idUti est vide, message d'erreur et renvois vers la page utilisateurs
if(empty($idUti)) {
    $_SESSION['ERROR_MESSAGE_SIGNAL_UTILISATEUR'] = "L'utilisateur' n'existe pas";
    header('Location: /../admin/moderation.php?page=utilisateurs');
    exit();
} else {
    // Modification de is_valid en FALSE
    $querySignalUtilisateur = ("UPDATE Utilisateur SET is_valid = 0 WHERE Id_Utilisateur = :idUti");
    $signalUtilisateur = $mysqlClient->prepare($querySignalUtilisateur);
    $signalUtilisateur->execute([
        'idUti' => $idUti,
    ]);

    $_SESSION['VALIDATE_MESSAGE_SIGNAL_UTILISATEUR'] = 'Le utilisateur est signalé';

    header('Location: /../admin/moderation.php?page=utilisateurs');
    exit();
}