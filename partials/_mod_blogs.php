<div class="espace_mod">
    <h2 class="titre_64_black">Blogs (<?php echo $nbrBlogs['count'] ?>)</h2>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_SIGNAL_BLOG'])) {
                echo $_SESSION['VALIDATE_MESSAGE_SIGNAL_BLOG'];
                $_SESSION['VALIDATE_MESSAGE_SIGNAL_BLOG'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_SIGNAL_BLOG'])) {
                echo $_SESSION['ERROR_MESSAGE_SIGNAL_BLOG'];
                $_SESSION['ERROR_MESSAGE_SIGNAL_BLOG'] = '';
            }
        ?>
    </p>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_VALIDE_BLOG'])) {
                echo $_SESSION['VALIDATE_MESSAGE_VALIDE_BLOG'];
                $_SESSION['VALIDATE_MESSAGE_VALIDE_BLOG'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_VALIDE_BLOG'])) {
                echo $_SESSION['ERROR_MESSAGE_VALIDE_BLOG'];
                $_SESSION['ERROR_MESSAGE_VALIDE_BLOG'] = '';
            }
        ?>
    </p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titre</th>
                <th class="espace_mod_contenu">Contenu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blogs as $blog): ?>
                <tr>
                    <th><?php echo $blog['Id_Blog'] ?></td>
                    <td><img class="espace_mod_img_blog" src="/../ASSET/img/blog/<?php echo $blog['image'] ?>"></td>
                    <td><?php echo $blog['titre'] ?></td>
                    <td class="espace_mod_contenu"><?php echo $blog['contenu'] ?></td>
                    <td class="actions">
                        <a href="/../blog.php?id=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></a>
                        <a href="/../script/mod_script_valide_blog.php?idBlog=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg></a>
                        <a href="/../script/mod_script_signal_blog.php?idBlog=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>