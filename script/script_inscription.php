<?php
require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$nom = trim($_POST['nom']);
$prenom  = trim($_POST['prenom']);
$pseudo = trim($_POST['pseudo']);
$ddn = trim($_POST['ddn']);
$email  = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirm_password']);
$image = $_FILES['image'];

//var_dump($nom, $prenom, $pseudo, $ddn, $email, $image);

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

        move_uploaded_file($tmpName, '../ASSET/img/user/'.$image);
    } else {
        $_SESSION['ERROR_MESSAGE_INSCRIPTION'] = "L'image n'est pas correct";
        header('Location: /../inscription.php');
        exit();
    }
}

// var_dump($titre, $categorie, $image, $contenu);

// Vérification que l'email ne soit pas deja utiliser
$selectEmail = $mysqlClient->prepare('SELECT email FROM Utilisateur WHERE email = :email');
$selectEmail->execute([
    'email' => $email,
]);
$verifEmail = $selectEmail->fetch();

if(!empty($verifEmail)) {
    $_SESSION['ERROR_MESSAGE_INSCRIPTION'] = "L'email est déjà utilisé";
    header('Location: /../inscription.php');
    exit();
}

// Vérification que les deux mots de passes reçus soit les mêmes
if($password != $confirmPassword) {
    $_SESSION['ERROR_MESSAGE_INSCRIPTION'] = "Les mots de passe ne sont pas similaire";
    header('Location: /../inscription.php');
    exit();
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
}

// Si une des informations est vide, renvoi vers la page du blog avec une erreur
if(empty($nom) && empty($prenom) && empty($pseudo) && empty($ddn) && empty($email) && empty($password) && empty($image)) {
    $_SESSION['ERROR_MESSAGE_INSCRIPTION'] = 'Merci de remplir tout les champs du formulaire';
    header('Location: /../inscription.php');
    exit();
} else {
    // Insertion de l'utilisateur dans la base
    $queryInsertUtilisateur = ('INSERT INTO Utilisateur(nom, prenom, pseudo, ddn, email, password, image) VALUES (:nom, :prenom, :pseudo, :ddn, :email, :password, :image)');
    $insertUtilisateur = $mysqlClient->prepare($queryInsertUtilisateur);
    $insertUtilisateur->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'pseudo' => $pseudo,
        'ddn' => $ddn,
        'email' => $email,
        'password' => $password,
        'image' => $image,
    ]);

    // Récupération de l'email de l'utilisateur
    $selectIdUti = $mysqlClient->prepare('SELECT Id_Utilisateur FROM Utilisateur WHERE email = :email');
    $selectIdUti->execute([
        'email' => $email,
    ]);
    $idUti = $selectIdUti->fetch(PDO::FETCH_ASSOC);

    session_start();
    $_SESSION['LOGGED_USER'] = [
        'email' => $email,
        'idUti' => $idUti['Id_Utilisateur'],
    ];

    $_SESSION['VALIDATE_MESSAGE_INSCRIPTION'] = 'Vous etes bien inscrit !';

    header('Location: /../accueil.php');
    exit();
}