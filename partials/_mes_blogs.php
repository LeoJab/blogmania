<div class="mon_compte">
    <div class="section">
        <div class="section_blogs_all">
            <?php foreach($blogs as $blog): ?>
                <div class="card">
                    <?php include(__dir__ . '/_card_blog.php'); ?>
                    <div class="btn">
                        <div class="btnPopupEditBlog" data-target="#popupEditBlog-<?php echo $blog['Id_Blog']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/></svg></div>
                        <div class="btnPopupBlog" data-target="#popupBlog-<?php echo $blog['Id_Blog']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg></div>
                        <div class="btnPopupCom" data-target="#popupCom-<?php echo $blog['Id_Blog']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square-text"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M13 8H7"/><path d="M17 12H7"/></svg></div>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></a>
                    </div>
                </div>
                <div class="none" id="popupCom-<?php echo $blog['Id_Blog']; ?>">
                    <div class="popup_encart"></div>
                    <div class="popup_contenu">
                        <div class="btnPopupComClose"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></div>
                        <?php commentaireIdBlog($blog['Id_Blog']) ?>
                    </div>
                </div>

                <div class="none" id="popupBlog-<?php echo $blog['Id_Blog']; ?>">
                    <div class="popup_encart"></div>
                    <div class="popup_contenu">
                        <div class="btnPopupBlogClose"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></div>
                        <?php blog($blog['Id_Blog']) ?>
                    </div>
                </div>

                <div class="none" id="popupEditBlog-<?php echo $blog['Id_Blog']; ?>">
                    <div class="popup_encart"></div>
                    <div class="popup_contenu">
                        <div class="btnPopupEditBlogClose"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></div>
                        <?php editBlog($blog['Id_Blog']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>