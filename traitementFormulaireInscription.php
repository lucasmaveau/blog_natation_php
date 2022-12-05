<?php
if(isset($_POST['envoi_inscription'])){ 
    //on fait une serie de test voir si chaque champ a été renseigné et si pas le cas alors message d'erreur
    if (empty($_POST["prenom"])) {
        echo "<script>alert('ERREUR : Prénom non renseigné');</script>";
        require('creation_compte.php');}
    
    elseif (empty($_POST["nom"])) {
        echo "<script>alert('ERREUR : Nom non renseigné');</script>";
        require('creation_compte.php');}

    elseif (empty($_POST["date_naissance"])) {
        echo "<script>alert('ERREUR : Date de Naissance non renseigné');</script>";
        require('creation_compte.php');}
        
    elseif (empty($_POST["email"])) {
        echo "<script>alert('ERREUR : E-mail non renseigné');</script>";
        require('creation_compte.php');}
    
    elseif (empty($_POST["mot_de_passe"])) {
        echo "<script>alert('ERREUR : Mot de passe non renseigné');</script>";
        require('creation_compte.php');}

    elseif (empty($_POST["confirmation_mdp"]) || $_POST["confirmation_mdp"] != $_POST["mot_de_passe"]) {
        echo "<script>alert('ERREUR : Les mots de passe ne correspondent pas');</script>";
        require('creation_compte.php');}
    else{
        try {
            require_once('header.php');
            
            // une fois que chaque champ a été renseigné, on va ajouter dans la bdd les informations renseignées
            $requete_insertion = $bdd->prepare('INSERT INTO utilisateurs (prenom, nom, date_naissance, email, mot_de_passe) VALUES (?, ?, ?, ?, ?)');
            $mdp_hachage = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            
            $requete_insertion->execute([$_POST['prenom'], $_POST['nom'], $_POST['date_naissance'], $_POST['email'], $mdp_hachage]);

            session_start();
            // puis on récupère les infos de l'utilisateur pour les stocker dans la session
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['mot_de_passe'] = $_POST['mot_de_passe'];
            $_SESSION['prenom'] = $_POST['prenom'];
            
            //récupérer le id de l'utilisateur pour le stocker dans la session
            $requete = $bdd->prepare("SELECT id from utilisateurs WHERE email = ?");
            $requete->bindParam(1, $_SESSION['login'],PDO::PARAM_STR); 
            $requete->execute();
            $resultatRequete = $requete->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $resultatRequete['id'];
            
            // enfin on redirige vers la page d'accueil
           header('Location: page_blog.php');}

        catch(PDOException $e){
            echo "Erreur: ".$e->getMessage();
        }
        }
    }
?>
