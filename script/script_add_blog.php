<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$titre = trim($_POST['titre']);
$categorie = $_POST['categorie'];
$image = $_FILES['image'];
$contenu = trim($_POST['contenu']);
$idUti = $_SESSION['LOGGED_USER']['idUti'];
$date = new DateTime();

//var_dump($titre, $categorie, $image, $contenu);

// Vérification que la categorie recus soit existante
$selectCategorie = $mysqlClient->prepare('SELECT * FROM Categorie WHERE nom LIKE :nom');
$selectCategorie->execute([
    'nom' => $categorie,
]);
$verifCategorie = $selectCategorie->fetch();

if($verifCategorie == NULL) {
    $_SESSION['ERROR_MESSAGE_ADD_BLOG'] = 'Merci de choisir une catégorie correct';
    header('Location: /../add_blog.php');
    exit();
}

// Vérification de l'image reçus
if(isset($_FILES['image'])){
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
        header('Location: /../add_blog.php');
        exit();
    }
}

var_dump($titre, $categorie, $image, $contenu);


// Si le titre, la catégorie, l'image ou le contenu sont vide, renvoi vers la page du blog avec une erreur
if(empty($titre) && empty($categorie) && empty($image) && empty($contenu)) {
    $_SESSION['ERROR_MESSAGE_ADD_BLOG'] = 'Merci de remplir tout les champs du formulaire';
    header('Location: /../add_blog.php');
    exit();
} else {
    // Insertion du commentaire dans la base
    $queryInsertBlog = ('INSERT INTO Blog(titre, id_categorie, image, contenu, id_utilisateur, date_ajout) VALUES (:titre, :idCate, :image, :contenu, :idUti, :date)');
    $insertBlog = $mysqlClient->prepare($queryInsertBlog);
    $insertBlog->execute([
        'titre' => $titre,
        'idCate' => $verifCategorie['Id_Categorie'],
        'image' => $image,
        'contenu' => $contenu,
        'idUti' => $idUti,
        'date' => $date->format('d/m/Y à H\hi'),
    ]);

    $_SESSION['VALIDATE_MESSAGE_ADD_BLOG'] = 'Votre blog est publié !';

    header('Location: /../add_blog.php');
    exit();
}