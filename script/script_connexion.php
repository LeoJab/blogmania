<?php
session_start();
require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$querySelectUtilisateur = ('SELECT * FROM Utilisateur WHERE email = :email');
$selectUtilisateur = $mysqlClient->prepare($querySelectUtilisateur);
$selectUtilisateur->execute([
    'email' => $email,
]);
$utilisateur = $selectUtilisateur->fetch(PDO::FETCH_ASSOC);

// var_dump($email, $password); 

if(!empty($email) && !empty($password)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ERROR_MESSAGE_LOGIN'] = 'Il faut une email valide pour se connecter';
        header('Location: /../connexion.php');
        exit();
    }

    if ($utilisateur['email'] == $email && password_verify($password, $utilisateur['password'])) 
    {
        session_destroy();
        session_start();
        $_SESSION['LOGGED_USER'] = [
            'email' => $utilisateur['email'],
            'idUti' => $utilisateur['Id_Utilisateur'],
        ];
        $_SESSION['VALIDATE_MESSAGE_LOGIN'] = "Vous êtes connecté !";
        header('Location: /../accueil.php');
        exit();
    } else {
        $_SESSION['ERROR_MESSAGE_LOGIN'] = "L'email ou le mot de passe n'est pas correct";
        header('Location: /../connexion.php');
        exit();
    }
} else {
    $_SESSION['ERROR_MESSAGE_LOGIN'] = "Merci de bien remplir tout les champs";
    header('Location: /../connexion.php');
    exit();
} 