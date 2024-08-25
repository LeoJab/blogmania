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

// Selection du blog correspondant à l'id reçus
$selectBlog = $mysqlClient->prepare('SELECT Id_Blog FROM Blog WHERE Id_Blog = :idBlog');
$selectBlog->execute([
    'idBlog' => $idBlog,
]);
$verifBlog = $selectBlog->fetch();

if($verifBlog == NULL) {
    $_SESSION['ERROR_MESSAGE_DELETE_COMMENTAIRE'] = "Le commentaire n'existe pas ou vous n'êtes pas le créateur";

    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
} else {
    // Sureppresion du commentaire correspondant à l'id reçus
    $queryDeleteCom = 'DELETE FROM Commentaire WHERE Id_Utilisateur = :idUti AND Id_Commentaire = :idCom';
    $deleteCom = $mysqlClient->prepare($queryDeleteCom);
    $deleteCom->execute([
        'idUti' => $idUti,
        'idCom' => $intIdCom,
    ]);
    
    $_SESSION['VALIDATE_MESSAGE_DELETE_COMMENTAIRE'] = "Votre commentaire a bien été supprimer !";
    
    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}