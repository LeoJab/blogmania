<?php
session_start();

require_once(__dir__ . '/../sql/dataBase/dataBaseConnect.php');
require_once(__dir__ . '/../function.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/../ASSET/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Farro:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="/../ASSET/js/main.js"></script>

    <title>BlogMania</title>
</head>
<body>
    <div id="border">
    <header>
        <div class="header_nav">
            <img id="header_logo" src="/../ASSET/img/logo.png" alt="Logo du site">
            <a class="text_24_black" href="/../accueil.php">Revenir sur le site</a>
        </div>
        <div class="header_nav">
            <a class="text_24_black" href="/admin/admin.php?page=blogs">Espace admin</a>
            <a class="text_24_black" href="/admin/moderation.php?page=blogs">Espace modération</a>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <a class="btnLogout" href="/../script/script_deconnexion.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right-to-line"><path d="M17 12H3"/><path d="m11 18 6-6-6-6"/><path d="M21 5v14"/></svg></a>
            <?php endif; ?>
        </div>
    </header>
</body>
</html>