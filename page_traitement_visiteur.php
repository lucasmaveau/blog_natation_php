<?php
session_start();
// attribution de la variable de session en "visiteur" pour l'affichage de la page blog
$_SESSION['prenom'] = "visiteur";
header('Location: page_blog.php'); // redirection vers la page blog
?>