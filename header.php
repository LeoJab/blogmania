<?php
session_start();

require_once(__dir__ . '/sql/dataBase/dataBaseConnect.php');
require_once(__dir__ . '/function.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// QUERY TOUTES LES CATEGORIES
$queryCategorie = 'SELECT * FROM categorie';
$selectCategorie = $mysqlClient->prepare($queryCategorie);
$selectCategorie->execute();
$categories = $selectCategorie->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="ASSET/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Farro:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="ASSET/js/main.js"></script>

    <title>BlogMania</title>
</head>
<body>
    <div id="border">
    <header>
        <div class="header_nav">
            <img id="header_logo" src="ASSET/img/logo.png" alt="Logo du site">
            <a class="text_24_black" href="/accueil.php">Accueil</a>
            <p id="btnHeaderBlog" class="text_24_black">Blogs</p>   
            <a class="text_24_black" href="/contact.php">Contact</a>
        </div>
        <div class="header_nav">
            <?php if(!isset($_SESSION['LOGGED_USER'])): ?>
                <a class="text_24_black" href="/connexion.php">CONNEXION</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <a class="text_24_black" href="/mon_compte.php?page=mes_informations">MON COMPTE</a>
            <?php endif; ?>
            <a class="btn_create" href="/add_blog.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                CRÉER MON BLOG
            </a>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <a class="btnLogout" href="/script/script_deconnexion.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right-to-line"><path d="M17 12H3"/><path d="m11 18 6-6-6-6"/><path d="M21 5v14"/></svg></a>
            <?php endif; ?>
        </div>
    </header>
    <div id="menuHeaderBlog" class="header_nav_menu none">
        <ul>
            <li><a class="text_24_black" href="#">Plus récent</a></li>
            <?php foreach($categories as $categorie): ?>
                <li><a class="text_24_black" href="/categorie.php?id=<?php echo $categorie['Id_Categorie'] ?>"><?php echo $categorie["nom"] ?></a></li>
            <?php endforeach ?>
            <li><a class="text_24_black" href="#">Top des Blogs</a></li>
            <li>
                <form action="" method="GET">
                    <input type="text" placeholder="Rechercher...">
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></button>
                </form>
            </li>
        </ul>
    </div>
</body>
</html>