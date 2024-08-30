<?php 
session_start();

include_once(__dir__ . '/header.php');
?>
<h1>PAGE ERREUR 404 !</h1>
<?php echo $_SESSION['LOGGED_USER']['role'] ?>