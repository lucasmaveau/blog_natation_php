<?php
require_once('header.php');
if ($bdd) {
    // on récupère tous les utilisateurs de la bdd
    $requete = $bdd->prepare("SELECT * from utilisateurs");
    $requete->execute();
    $resultatRequete = $requete->fetchAll(PDO::FETCH_ASSOC);

    session_start();
    
    $user_connu = false;

    // on teste si le login et le mot de passe correspondent à un utilisateur de la bdd dans une boucle..
    //..pour chaque utilisateur de la bdd
    foreach ($resultatRequete as $user) {
        if ($user["email"] == $_POST["login"] && password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
            $user_connu = true;
            $_SESSION['id'] = $user['id'];

        }
    }
    
    // si l'user est connu, on redirige vers la page d'accueil du site 
    if ($user_connu) {
        //on enregistre ses informations dans la session
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['mot_de_passe'] = $_POST['mot_de_passe'];

        //on récupère le prénom pour l'afichage dans la page d'accueil de "bonjour prénom"
        $requete = $bdd->prepare("SELECT prenom from utilisateurs WHERE email = ?");
        $requete->bindParam(1, $_SESSION['login'],PDO::PARAM_STR);
        $requete->execute();
        $resultatRequete = $requete->fetch(PDO::FETCH_ASSOC);
        $_SESSION['prenom'] = $resultatRequete['prenom'];
        require('page_blog.php');
    } else {
        // si l'user n'est pas connu, on affiche un message d'erreur
        echo "<script>alert('ERREUR : Utilisateur inconnu');</script>";
        require('page_connexion.php');
    }
}
?>