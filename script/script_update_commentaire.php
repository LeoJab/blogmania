<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

function valide_donnees($donnees) {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    return $donnees;
}

$titre = valide_donnees($_POST['titre']);
$contenu = valide_donnees($_POST['contenu']);
$idCom = $_GET['idCom'];

var_dump($titre, $contenu);

if(!isset($titre) && !isset($contenu)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'] = 'Merci de renseigner un titre et du contenu à votre commentaire';
    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}

if(!empty($titre) && !empty($contenu)) {
    $queryUpdateCom = ('UPDATE Commentaire SET titre = :titre, contenu = :contenu WHERE id_commentaire = :idCom');
    $updateCom = $mysqlClient->prepare($queryUpdateCom);
    $updateCom->execute([
        'titre' => $titre,
        'contenu' => $contenu,
        'idCom' => $idCom,
    ]);

    $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'] = '';

    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}