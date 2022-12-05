<?php
//verifie si le login est dans la bdd puis nouveau mdp et confirmation mdp
if(isset($_POST['envoi_changement_mdp'])){
        require_once('header.php');
        $requete = $bdd->query("SELECT email FROM utilisateurs");
        $resultatRequete = $requete->fetchAll(PDO::FETCH_ASSOC);

        
        $user_connu = false;
        foreach($resultatRequete as $user){
            if($user["email"] == $_POST["login"]){
                // si le login est dans la bdd, on passe user_connu à true
                $user_connu = true;
            }
        }

        if($user_connu){
            // on teste si les deux mots de passe sont identiques et si c'est le cas on le modifie dans la bdd
            if($_POST["nouveau_mot_de_passe"] == $_POST["confirmation_nouveau_mot_de_passe"]){
                $requete = $bdd->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE email = ?");
                $requete->execute(array(password_hash($_POST["nouveau_mot_de_passe"], PASSWORD_DEFAULT), $_POST["login"]));
                header('Location: page_connexion.php');
            }
            else{
                // si les deux mots de passe ne sont pas identiques, on affiche un message d'erreur
                echo "<script>alert('ERREUR : Les mots de passe ne correspondent pas');</script>";
                require('changement_mdp.php');
            }
        }
        else{
            // si le login n'est pas dans la bdd, on affiche un message d'erreur
            echo "<script>alert('ERREUR : Utilisateur inconnu');</script>";
            require('changement_mdp.php');
        }
    }