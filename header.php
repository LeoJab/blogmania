<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/ASSET/img/logo.png">

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
    <!-- HEADER COMPUTER -->
    <header class="header_computer">
        <div class="header_nav">
            <a href="/acceuil.php">
                <img id="header_logo" src="ASSET/img/Logo.png" alt="Logo du site">
            </a>
            <a class="text_24_black" href="/accueil.php">Accueil</a>
            <p id="btnHeaderBlog" class="text_24_black">Blogs</p>   
        </div>
        <div class="header_nav">
            <?php if(!isset($_SESSION['LOGGED_USER'])): ?>
                <a class="text_24_black" href="/connexion.php">CONNEXION</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <?php if($_SESSION['LOGGED_USER']['role'] == 'ROLE_MODERATEUR'): ?>
                    <a class="text_24_black" href="/admin/moderation.php?page=blogs">ESPACE MODERATION</a>
                <?php elseif($_SESSION['LOGGED_USER']['role'] == 'ROLE_ADMIN'): ?>
                    <a class="text_24_black" href="/admin/admin.php?page=blogs">ESPACE ADMINISTRATEUR</a>
                <?php else: ?>
                    <a class="text_24_black" href="/mon_compte.php?page=mes_informations">MON COMPTE</a>
                <?php endif; ?>
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
    <!-- MENU COMPUTER HOVER BLOGS -->
    <div id="menuHeaderBlog" class="header_nav_menu header_nav_computer none">
        <ul>
            <?php foreach($categories as $categorie): ?>
                <li><a class="text_24_black" href="/categorie.php?id=<?php echo $categorie['Id_Categorie'] ?>"><?php echo $categorie["nom"] ?></a></li>
            <?php endforeach ?>
            <li>
                <form action="" method="GET">
                    <input type="text" placeholder="Rechercher...">
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></button>
                </form>
            </li>
        </ul>
    </div>
    <!-- HEADER MOBILE -->
    <header class="header_mobile">
        <div class="header_nav">
            <a href="/accueil.php">
                <img id="header_logo" src="ASSET/img/Logo.png" alt="Logo du site">
            </a>
            <svg id="btnHeaderMobile" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-justify"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        </div>
        <div class="header_nav_mobile none" id="headerNavMobile">
            <a class="text_24_black" href="/accueil.php">Accueil</a>
            <a class="text_24_black" href="/categorie.php?id=1">Blogs</a> 
            <?php if(!isset($_SESSION['LOGGED_USER'])): ?>
                <a class="text_24_black" href="/connexion.php">CONNEXION</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <?php if($_SESSION['LOGGED_USER']['role'] == 'ROLE_MODERATEUR'): ?>
                    <a class="text_24_black" href="/admin/moderation.php?page=blogs">ESPACE MODERATION</a>
                <?php elseif($_SESSION['LOGGED_USER']['role'] == 'ROLE_ADMIN'): ?>
                    <a class="text_24_black" href="/admin/admin.php?page=blogs">ESPACE ADMINISTRATEUR</a>
                <?php else: ?>
                    <a class="text_24_black" href="/mon_compte.php?page=mes_informations">MON COMPTE</a>
                <?php endif; ?>
            <?php endif; ?>
            <a class="btn_create" href="/add_blog.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                CRÉER MON BLOG
            </a>
            <?php if(isset($_SESSION['LOGGED_USER'])): ?>
                <a class="btnLogout" href="/script/script_deconnexion.php">Deconnexion</a>
            <?php endif; ?>
            <form action="" method="GET">
                <input type="text" placeholder="Rechercher...">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg></button>
            </form> 
        </div>
    </header>
</body>
</html>