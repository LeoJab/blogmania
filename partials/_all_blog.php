<div class="section">
    <h3 class="section_titre titre_32_black">Tous les Blogs</h3>
    <div class="section_blogs">
        <?php foreach($blogAll as $blog): ?>
            <?php include(__dir__ . '/_card_blog.php'); ?>
        <?php endforeach; ?>
    </div>
</div>