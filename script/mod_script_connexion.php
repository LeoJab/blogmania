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
        header('Location: /../admin/moderation.php?page=connexion');
        exit();
    }

    if ($utilisateur['email'] == $email && password_verify($password, $utilisateur['password'])) 
    {
        session_destroy();
        session_start();
        $_SESSION['LOGGED_USER'] = [
            'email' => $utilisateur['email'],
            'idUti' => $utilisateur['Id_Utilisateur'],
            'role' => $utilisateur['role'],
        ];
        $_SESSION['VALIDATE_MESSAGE_LOGIN'] = "Vous êtes connecté !";
        
        if($_SESSION['LOGGED_USER']['role'] == "ROLE_MODERATEUR") {
            header('Location: /../admin/moderation.php?page=blogs');
            exit();
        } elseif($_SESSION['LOGGED_USER']['role'] == "ROLE_ADMIN") {
            header('Location: /../admin/admin.php?page=blogs');
            exit();
        }
    } else {
        $_SESSION['ERROR_MESSAGE_LOGIN'] = "L'email ou le mot de passe n'est pas correct";
        header('Location: /../admin/moderation.php?page=connexion');
        exit();
    }
} else {
    $_SESSION['ERROR_MESSAGE_LOGIN'] = "Merci de bien remplir tout les champs";
    header('Location: /../admin/moderation.php?page=connexion');
    exit();
} 