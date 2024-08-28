<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idUti = $_GET['idUti'];

// Si la variable $idUti est vide, message d'erreur et renvois vers la page utilisateurs
if(empty($idUti)) {
    $_SESSION['ERROR_MESSAGE_VALIDE_UTILISATEUR'] = "L'utilisateur n'existe pas";
    header('Location: /../admin/admin.php?page=utilisateurs');
    exit();
} else {
    // Modification de is_valid en FALSE
    $queryValideUtilisateur = ("UPDATE Utilisateur SET is_valid = 1 WHERE Id_Utilisateur = :idUti");
    $valideUtilisateur = $mysqlClient->prepare($queryValideUtilisateur);
    $valideUtilisateur->execute([
        'idUti' => $idUti,
    ]);

    $_SESSION['VALIDATE_MESSAGE_VALIDE_UTILISATEUR'] = "L'utilisateur est validé";

    header('Location: /../admin/admin.php?page=utilisateurs');
    exit();
}