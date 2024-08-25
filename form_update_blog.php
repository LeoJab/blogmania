<?php
require_once(__dir__ . '/header.php');

$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idBlog = $_GET['idBlog'];

//var_dump($idUti, $idBlog);

// Récupération des informations du blog et vérification que l'utilisateur soit bien le créateur
$selectBlog = $mysqlClient->prepare('SELECT blog.*, categorie.nom FROM Blog INNER JOIN Categorie ON Categorie.Id_Categorie = Blog.Id_Categorie WHERE Blog.Id_Utilisateur = :idUti AND Blog.Id_Blog = :idBlog');
$selectBlog->execute([
    'idUti' => $idUti,
    'idBlog' => $idBlog,
]);
$blog = $selectBlog->fetch();

if(empty($blog)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'] = "Le blog n'existe pas ou vous n'êtes pas le créateur";
    header("Location: /../mon_compte.php?page=mes_blogs");
    exit();
}
?>

<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Modification de votre blog</h2>
<form class="formulaire" action="/script/script_update_blog.php?idBlog=<?php echo $blog['Id_Blog'] ?>" method="POST" enctype="multipart/form-data">
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_UPDATE_BLOG'])) {
                echo $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'];
                $_SESSION['ERROR_MESSAGE_UPDATE_BLOG'] = '';
            }
        ?>
    </p>
    <div>
        <div class="label_input">
            <label for="titre">Titre du Blog</label>
            <input type="text" name="titre" id="titre" value="<?php echo $blog['titre'] ?>" maxlenght="50" required>
            <label for="categorie">Selectionner une catégorie:</label>
            <select name="categorie" id="categorie" required>
                <option value="<?php echo $blog['nom'] ?>"><?php echo $blog['nom'] ?></option>
                <option value="Cinéma & Culture">Cinéma & Culture</option>
                <option value="Musique">Musique</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Déco">Déco</option>
                <option value="Beauté & santé">Beauté & santé</option>
                <option value="Mode">Mode</option>
                <option value="Jeux & Jeux vidéo">Jeux & Jeux vidéo</option>
                <option value="High-tech et sciences">High-tech et sciences</option>
                <option value="Sport">Sport</option>
            </select>
            <label for="image">Image de présentation de votre Blog</label>
            <input type="file" name="image" id="image" value="" accept="image/png, image/jpeg, image/webp">
            <span class="error" id="errImg"></span>
            <img id="preview" src="/ASSET/img/blog/<?php echo $blog['image'] ?>" alt="Prévisualisation de l'image">
            <label for="contenu">Contenu de votre Blog</label>
            <textarea name="contenu" id="contenu" maxlenght="500" required><?php echo $blog['contenu'] ?></textarea>
        </div>
    </div>
    <button class="btn_gris" type="submit">Modifier mon Blog</button>
</form>

<?php
require_once(__dir__ . '/footer.php');
?>