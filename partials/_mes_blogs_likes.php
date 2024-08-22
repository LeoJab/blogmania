<div class="mon_compte">
    <div class="section">
        <div class="section_blogs_all">
            <?php if(isset($_SESSION['LIKE_ERROR_MESSAGE'])): ?>
                <p class="error"><?php echo $_SESSION['LIKE_ERROR_MESSAGE']; ?></p>
            <?php endif; ?>
            <?php foreach($blogs as $blog): ?>
                <div class="card">
                    <?php include(__dir__ . '/_card_blog.php'); ?>
                    <div class="btn">
                        <div>
                            <form class="form_like" action="/script/script_remove_like.php?page=mes_blogs_likes" method="POST">
                                <input type="hidden" name="id_blog" value="<?php echo $blog['Id_Blog'] ?>">
                                <button type="submit"><svg class="blog_liked" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if($blogs == NULL): ?>
                <h2 class="titre_32_black">Vous n'avez aucun blog de liké</h2>
            <?php endif ?>
        </div>
    </div>
</div>