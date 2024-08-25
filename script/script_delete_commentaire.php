<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idCom = $_GET['idCom'];

if(!preg_match('#^[0-9]$#', $idCom) && !is_numeric($idUti)) {
    $_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'] = "Impossible de supprimer ce commentaire.";

    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}

$intIdCom = intval($idCom);

$queryDeleteCom = 'DELETE FROM Commentaire WHERE Id_Utilisateur = :idUti AND Id_Commentaire = :idCom';
$deleteCom = $mysqlClient->prepare($queryDeleteCom);
$deleteCom->execute([
    'idUti' => $idUti,
    'idCom' => $intIdCom,
]);

$_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'] = "";

header("Location: /../mon_compte.php?page=mes_commentaires");
exit();