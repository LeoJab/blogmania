<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$titre = trim($_POST['titre']);
$contenu = $_POST['contenu'];
$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idBlog = $_GET['idBlog'];
$date = new DateTime();

//var_dump($titre, $contenu);

// Selection du blog correspondant à l'id reçus
$selectBlog = $mysqlClient->prepare('SELECT Id_Blog FROM Blog WHERE Id_Blog = :idBlog');
$selectBlog->execute([
    'idBlog' => $idBlog,
]);
$verifBlog = $selectBlog->fetch();

// Vérification que le blog est existant
if($verifBlog == NULL) {
    echo "Le blog n'existe pas";
    return;
}

// Si le titre ou le contenu est vide, renvoi vers la page du blog avec une erreur
if(empty($titre) && empty($contenu)) {
    $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'] = 'Merci de renseigner un titre et du contenu à votre commentaire';
    header("Location: /../blog.php?id=$idBlog");
    exit();
} else {
    // Insertion du commentaire dans la base
    $queryInsertCom = ('INSERT INTO Commentaire(id_blog, id_utilisateur, date_publication, titre, contenu) VALUES (:idBlog, :idUti, :date, :titre, :contenu)');
    $insertCom = $mysqlClient->prepare($queryInsertCom);
    $insertCom->execute([
        'idBlog' => $idBlog,
        'idUti' => $idUti,
        'date' => $date->format('d/m/Y à H\hi'),
        'titre' => $titre,
        'contenu' => $contenu
    ]);

    $_SESSION['VALIDATE_MESSAGE_ADD_COMMENTAIRE'] = 'Votre commentaire est publié !';

    header("Location: /../blog.php?id=$idBlog");
    exit();
}