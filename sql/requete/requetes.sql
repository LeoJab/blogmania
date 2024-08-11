/* ---------- REQUETE UTILISATEUR ---------- */
/* Tous les utilisateurs */
SELECT * FROM Utilisateur;
/* Les utilisateurs is_valid is NULL */
SELECT * FROM Utilisateur WHERE is_valid is NULL;
/* Les utilisateurs is_valid = 0 */
SELECT * FROM Utilisateur WHERE is_valid IS FALSE;
/* Les informations de l’utilisateur */
SELECT * FROM Utilisateur WHERE id = 1;

/* ---------- REQUETE BLOG ---------- */
/* Tous les blogs */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE;
/* Les blogs récent */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE ORDER BY date_ajout ASC LIMIT 9;
/* Le top des blogs */
SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE is_valid IS NOT FALSE GROUP BY Likes.Id_Blog ORDER BY COUNT(Likes.Id_blog) DESC LIMIT 6
/* 6 blogs aléatoires */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE ORDER BY RAND() LIMIT 6;
/* Tous les blogs d’un utilisateur */
SELECT * FROM Blog WHERE id_utilisateur = 1;
/* Tous les blogs d’une catégorie */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND id_categorie = 1;
/* Les blogs récent d’une catégorie */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND id_categorie = 1 ORDER BY date_ajout ASC;
/* Les top blogs d’une catégorie */
/* Les blogs is_valid is NULL */
SELECT * FROM Blog WHERE is_valid IS NULL;
/* Les blogs is_valid = 0 */
SELECT * FROM Blog WHERE is_valid IS FALSE;
/* Un blog selon l’id */
SELECT * FROM Blog WHERE is_valid IS NOT FALSE AND id = 1;
/* Les blogs likés d'un utilisateur */
SELECT Blog.* FROM Likes INNER JOIN Blog ON Blog.Id_blog = Likes.Id_blog WHERE Likes.Id_utilisateur = 1;

/* ---------- REQUETE COMMENTAIRE ---------- */
/* Tous les commentaire d’un blog */
SELECT * FROM Commentaire WHERE is_valid IS NOT FALSE AND id_blog = 1;
/* Les commentaires d’un utilisateur + info blog */
SELECT * FROM Commentaire INNER JOIN Blog ON Commentaire.id_blog = Blog.id_blog WHERE id_utilisateur = 1;
/* Les commentaires is_valid is NULL */
SELECT * FROM Commentaire WHERE is_valid IS NULL;

/* ---------- REQUETE CATEGORIE ---------- */
/* Toutes les catégories */
SELECT * FROM Categorie