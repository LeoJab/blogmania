<div class="card_blog">
    <img src="../ASSET/img/blog/<?php echo htmlspecialchars($blog['image']); ?>" alt="Image du blog">
    <div class="contenu">
        <h3><?php echo htmlspecialchars($blog['titre']); ?></h3>
        <p><?php echo htmlspecialchars($blog['contenu']); ?></p>
        <a href="/blog.php?id=<?php echo htmlspecialchars($blog['Id_Blog']); ?>">Voir le blog</a>
    </div>
</div>