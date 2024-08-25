<div class="card_blog">
    <img src="../ASSET/img/blog/<?php echo $blog['image']; ?>" alt="Image du blog">
    <div class="contenu">
        <h3><?php echo $blog['titre']; ?></h3>
        <p><?php echo $blog['contenu']; ?></p>
        <a href="/blog.php?id=<?php echo $blog['Id_Blog'] ?>">Voir le blog</a>
    </div>
</div>