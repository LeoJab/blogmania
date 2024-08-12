<?php
require_once(__dir__ . "/header.php");

$queryRdmBlog = ('SELECT * FROM Blog WHERE is_valid IS NOT FALSE ORDER BY RAND() LIMIT 6');
$selectRdmBlog = $mysqlClient->prepare($queryRdmBlog);
$selectRdmBlog->execute();
$rdmBlogs = $selectRdmBlog->fetchAll();
?>

<div class="accueil_carroussel_all">
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
    <div class="accueil_carroussel">
        <?php foreach($rdmBlogs as $blog): ?>
            <?php include(__dir__ . '/partials/_card_blog.php'); ?>
        <?php endforeach; ?>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
</div>