<?php
//supprimer le record selectionné
if(isset($_POST['envoi_suppression'])){
    try{
        require_once('header.php');
        $requete = $bdd->prepare("DELETE FROM records WHERE id = ?");
        $requete->execute(array($_POST["record"]));
        header('Location: page_blog.php');
    }
    catch(PDOException $e){
        echo "Erreur: ".$e->getMessage();
    }
}
?>