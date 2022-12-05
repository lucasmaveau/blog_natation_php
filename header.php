<?php
// on se connecte à la base de données "projet_natation avec comme mot de passe "" et identifiant root
$bdd = new PDO("mysql:host=localhost;dbname=projet_natation",'root', '');
// ps : on appelle le header dans les pages qui ont besoin de se connecter à la base de données
?>