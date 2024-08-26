<?php
require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$querySelectUtilisateur = ('SELECT * FROM Utilisateur WHERE email = :email');
$selectAllUtilisateur = $mysqlClient->prepare($querySelectAllUtilisateur);
$selectAllUtilisateur->execute([
    'email' => $email,
]);
$utilisateur = $selectAllUtilisateur->fetch(PDO::FETCH_ASSOC);

if (empty($email) && empty($password)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ERROR_MESSAGE_LOGIN'] = 'Il faut une email valide pour se connecter';
        header('Location: /../connexion.php');
        exit();
    } else if(empty($utilisateur)) {

            if (
                $user['email'] === $email &&
                password_verify($password, $utilisateur['password'])
            ) {
                session_start();
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'idUti' => $user['Id_Utilisateur'],
                ];
                header('Location: /../accueil.php');
                exit();
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['ERROR_MESSAGE_LOGIN'] = 'Les informations envoyées ne permettent pas de vous identifier';
            header('Location: /../connexion.php');
            exit();
        }
}