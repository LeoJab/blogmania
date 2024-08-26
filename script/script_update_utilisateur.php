<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$nom = trim($_POST['nom']);
$prenom  = trim($_POST['prenom']);
$pseudo = trim($_POST['pseudo']);
$ddn = trim($_POST['ddn']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirm_password']);
$image = $_FILES['image'];
$idUti = $_SESSION['LOGGED_USER']['idUti'];

 var_dump($password);

// Si le password est vide
if(empty($confirmPassword)) {
    echo "vide !";
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
        $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'] = "L'image n'est pas correct";
        header('Location: /../mon_compte.php?page=mes_informations');
        exit();
    }
} else {
    $selectUtilisateurImage = $mysqlClient->prepare('SELECT image FROM Utilisateur WHERE Id_Utilisateur = :idUti');
    $selectUtilisateurImage->execute([
        'idUti' => $idUti,
    ]);
    $UtilisateurImage = $selectUtilisateurImage->fetch(PDO::FETCH_ASSOC);
    $image = $UtilisateurImage['image'];
}

// Vérification que l'email ne soit pas deja utiliser
$selectEmail = $mysqlClient->prepare('SELECT email FROM Utilisateur WHERE id_utilisateur = :idUti');
$selectEmail->execute([
    'idUti' => $idUti,
]);
$verifEmail = $selectEmail->fetch(PDO::FETCH_ASSOC);

if($email != $verifEmail['email']) {
    $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'] = "L'email est pas valide";
    header('Location: /../mon_compte.php?page=mes_informations');
    exit();
}

// Vérification que les deux mots de passes reçus soit les mêmes
if($password != $confirmPassword) {
    $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'] = "Les mots de passe ne sont pas similaire";
    header('Location: /../mon_compte.php?page=mes_informations');
    exit();
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
}

if(empty($nom) && empty($prenom) && empty($pseudo) && empty($ddn) && empty($password) && empty($image) && empty($idUti)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_UTILISATEUR'] = 'Merci de renseigner toutes les informations';
    header("Location: /../mon_compte.php?page=mes_informations");
    exit();
} else {
    $queryUpdateUtilisateur = ('UPDATE Utilisateur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, ddn = :ddn, image = :image WHERE Id_Utilisateur = :idUti');
    $updateUtilisateur = $mysqlClient->prepare($queryUpdateUtilisateur);
    $updateUtilisateur->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pseudo' => $pseudo,
        ':ddn' => $ddn,
        ':password' => $password,
        ':image' => $image,
        ':idUti' => $idUti,
    ]);

    $_SESSION['VALIDATE_MESSAGE_UPDATE_UTILISATEUR'] = 'Vos informations ont été modifiées !';

    header("Location: /../mon_compte.php?page=mes_informations");
    exit();
}