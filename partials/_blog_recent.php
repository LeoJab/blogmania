<div class="section">
    <h3 class="section_titre titre_32_black">Les Blogs Récents</h3>
    <div class="section_blogs">
        <?php foreach($blogRecents as $blog): ?>
            <?php include(__dir__ . '/_card_blog.php'); ?>
        <?php endforeach; ?>
    </div>
    <div class="section_btn">
        <svg class="svg_blog" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
    </div>
</div>