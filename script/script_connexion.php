<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');

$querySelectAllUsers = ('SELECT * FROM Utilisateur');
$selectAllUsers = $mysqlClient->prepare($querySelectAllUsers);
$selectAllUsers->execute();
$allUsers = $selectAllUsers->fetchAll();

$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut une email valide pour se connecter';
    } else {
        foreach($allUsers as $user) {
            if (
                $user['email'] === $postData['email'] &&
                $user['password'] === $postData['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'idUti' => $user['id_utilisateur'],
                ];

                header('Location: /../accueil.php');
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                strip_tags($postData['password'])
            );
        }
    }

    header('Location: /../accueil.php');
}