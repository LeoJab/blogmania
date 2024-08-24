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
$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idBlog = $_GET['idBlog'];
$date = new DateTime();

var_dump($titre, $contenu);

if(!isset($titre) && !isset($contenu)) {
    $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'] = 'Merci de renseigner un titre et du contenu à votre commentaire';
    header("Location: /../blog.php?id=$idBlog");
    exit();
}

if(!empty($titre) && !empty($contenu)) {
    $queryInsertCom = ('INSERT INTO Commentaire(id_blog, id_utilisateur, date_publication, titre, contenu) VALUES (:idBlog, :idUti, :date, :titre, :contenu)');
    $insertCom = $mysqlClient->prepare($queryInsertCom);
    $insertCom->execute([
        'idBlog' => $idBlog,
        'idUti' => $idUti,
        'date' => $date->format('d/m/Y à H\hi'),
        'titre' => $titre,
        'contenu' => $contenu
    ]);

    $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'] = '';

    header("Location: /../blog.php?id=$idBlog");
    exit();
}