<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$nom = trim($_POST['nom']);
$prenom  = trim($_POST['prenom']);
$pseudo = trim($_POST['pseudo']);
$ddn = trim($_POST['ddn']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirm_password']);
$image = $_FILES['image'];

var_dump($image);

// Vérification que le blog existe et que l'utilisateur soit bien le créateur
$selectBlog = $mysqlClient->prepare('SELECT * FROM Blog WHERE Id_Utilisateur = :idUti AND Id_Blog = :idBlog');
$selectBlog->execute([
    'idUti' => $idUti,
    'idBlog' => $idBlog,
]);
$verifBlog = $selectBlog->fetch();

if($verifBlog == NULL) {
    $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'] = "Le blog n'existe pas ou vous n'êtes pas le créateur";

    header("Location: /../form_update_blog.php");
    exit();
}

// Vérification que la categorie recus soit existante
$selectCategorie = $mysqlClient->prepare('SELECT * FROM Categorie WHERE nom LIKE :nom');
$selectCategorie->execute([
    'nom' => $categorie,
]);
$verifCategorie = $selectCategorie->fetch();

if($verifCategorie == NULL) {
    $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'] = 'Merci de choisir une catégorie correct';
    header('Location: /../form_update_blog.php');
    exit();
}

// Vérification de l'image reçus
if(!empty($_FILES['image']['tmp_name'])){
    $tmpName = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensions = ['jpg', 'png', 'jpeg', 'webp'];
    $maxSize = 6000000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);
        $image = $uniqueName.".".$extension;

        move_uploaded_file($tmpName, '../ASSET/img/blog/'.$image);
    } else {
        $_SESSION['ERROR_MESSAGE_ADD_BLOG'] = "L'image n'est pas correct";
        header('Location: /../form_update_blog.php');
        exit();
    }
} else {
    $selectBlogImage = $mysqlClient->prepare('SELECT image FROM Blog WHERE Id_Blog = :idBlog');
    $selectBlogImage->execute([
        'idBlog' => $idBlog,
    ]);
    $blogImage = $selectBlogImage->fetch(PDO::FETCH_ASSOC);
    $image = $blogImage['image'];
}

// var_dump($titre, $categorie, $image, $contenu);

// Si le titre, la catégorie, l'image ou le contenu sont vide, renvoi vers la page du blog avec une erreur
if(empty($titre) && empty($categorie) && empty($image) && empty($contenu)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'] = 'Merci de remplir tout les champs du formulaire';
    header('Location: /../form_update_blog.php');
    exit();
} else {
    // Insertion du commentaire dans la base
    $queryInsertBlog = ('UPDATE Utilisateur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, contenu = :contenu WHERE Id_Utilisateur = :idUti');
    $insertBlog = $mysqlClient->prepare($queryInsertBlog);
    $insertBlog->execute([
        'titre' => $titre,
        'idCate' => $verifCategorie['Id_Categorie'],
        'image' => $image,
        'contenu' => $contenu,
        'idBlog' => $idBlog,
    ]);

    $_SESSION['VALIDATE_MESSAGE_UPDATE_BLOG'] = 'Votre blog à été modifié !';

    header('Location: /../mon_compte.php?page=mes_blogs');
    exit();
}