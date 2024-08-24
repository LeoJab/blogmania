<div class="commentaire">
    <img src="<?php echo $commentaire['image'] ?>" alt="Photo de profil de l'utilisateur">
    <div class="contenu">
        <div class="pseudo_date">
            <p class="text_20_black"><?php echo htmlspecialchars($commentaire['pseudo']) ?></p>
            <p class="text_16_black_light">Publié le <?php echo htmlspecialchars($commentaire['date_publication']) ?></p>
        </div>
        <div>
            <h3 class="text_24_black titre"><?php echo htmlspecialchars($commentaire['titre']) ?></h3>
            <p class="text_18_black_light"><?php echo htmlspecialchars($commentaire['contenu']) ?></p>
        </div>
    </div>
</div>