<div class="espace_mod">
    <h2 class="titre_64_black">Blogs (<?php echo $nbrBlogs['count'] ?>)</h2>
    <p class="valid">
        <?php 
            if(isset($_SESSION['VALIDATE_MESSAGE_DELETE_BLOG'])) {
                echo $_SESSION['VALIDATE_MESSAGE_DELETE_BLOG'];
                $_SESSION['VALIDATE_MESSAGE_DELETE_BLOG'] = '';
            }
        ?>
    </p>
    <p class="error">
        <?php 
            if(isset($_SESSION['ERROR_MESSAGE_DELETE_BLOG'])) {
                echo $_SESSION['ERROR_MESSAGE_DELETE_BLOG'];
                $_SESSION['ERROR_MESSAGE_DELETE_BLOG'] = '';
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
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blogs as $blog): ?>
                <tr>
                    <th><?php echo htmlspecialchars($blog['Id_Blog']) ?></td>
                    <td><img class="espace_mod_img_blog" src="/../ASSET/img/blog/<?php echo htmlspecialchars($blog['image']) ?>"></td>
                    <td><?php echo htmlspecialchars($blog['titre']) ?></td>
                    <td class="contenu"><?php echo htmlspecialchars($blog['contenu']) ?></td>
                    <td class="actions">
                        <a href="/../blog.php?id=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></a>
                        <a href="/../script/admin_script_valide_blog.php?idBlog=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg></a>
                        <a href="/../script/admin_script_delete_blog.php?idBlog=<?php echo $blog['Id_Blog'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>