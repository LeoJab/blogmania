<?php
require_once(__dir__ . '/header.php');

$idUti = $_SESSION['LOGGED_USER']['idUti'];
$idCom = $_GET['idCom'];

//var_dump('idUti:', $idUti, 'idCom:', $idCom);

// Récupération des informations du commentaire et vérification que l'utilisateur soit bien le créateur
$selectCom = $mysqlClient->prepare('SELECT * FROM Commentaire WHERE Id_Utilisateur = :idUti AND Id_Commentaire = :idCom');
$selectCom->execute([
    'idUti' => $idUti,
    'idCom' => $idCom,
]);
$commentaire = $selectCom->fetch();

//var_dump($commentaire);

if(empty($commentaire)) {
    $_SESSION['ERROR_MESSAGE_UPDATE_COMMENTAIRE'] = "Le commentaire n'existe pas ou vous n'êtes pas le créateur";
    header("Location: /../mon_compte.php?page=mes_commentaires");
    exit();
}
?>

<h1 class="titre_90_blue">BlogMania</h1>
<h2 class="titre_64_black">Modification de votre commentaire</h2>
<div class="blog_commentaires">
    <div class="publie">
        <p class="error">
            <?php
                if(isset($_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'])) {
                    echo $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'];
                    $_SESSION['ERROR_MESSAGE_ADD_COMMENTAIRE'] = '';
                }
            ?>
        </p>
        <form action="/script/script_update_commentaire.php?idCom=<?php echo $commentaire['Id_Commentaire'] ?>" method="POST">
            <div class="titre_contenu">
                <input type="text" name="titre" placeholder="Titre du commentaire.." value="<?php echo $commentaire['titre'] ?>" maxlenght="50" required>
                <span></span>
                <textarea class='contenu' name="contenu" placeholder="Votre commentaire.." maxlenght="150" required><?php echo $commentaire['contenu'] ?></textarea>
            </div>
            <button type="submit">Modifier</button>
        </form>
    </div>
</div>

<?php
require_once(__dir__ . '/footer.php');
?>