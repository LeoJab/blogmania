<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$titre = trim($_POST['titre']);
$contenu = $_POST['contenu'];
$idCom = $_GET['idCom'];

// var_dump($titre, $contenu);

if(empty($titre) && empty($contenu)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'] = 'Merci de renseigner un titre et du contenu à votre commentaire';
    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
} else {
    $queryUpdateCom = ('UPDATE Commentaire SET titre = :titre, contenu = :contenu WHERE Id_Commentaire = :idCom');
    $updateCom = $mysqlClient->prepare($queryUpdateCom);
    $updateCom->execute([
        'titre' => $titre,
        'contenu' => $contenu,
        'idCom' => $idCom,
    ]);

    $_SESSION['VALIDATE_MESSAGE_UPDATE_COMMENTAIRE'] = 'Votre commentaire à été modifié !';

    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}