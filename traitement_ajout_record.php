<?php
session_start();
// quand bouton 'envoi_record' est cliqué
if(isset($_POST['envoi_record'])){
    // test pour verifier si les champs distance, temps, compétition et nage sont tous renseignés
    if (empty($_POST["distance"]) || empty($_POST["nage"]) || empty($_POST["temps"]) || empty($_POST["competition"])) {
        echo "<script>alert('ERREUR : Les champs obligatoires ne sont pas rensignés');</script>";
        // affichage d'erreur puis redirection vers page de création du record
        header('Location: creation_record.php');
    }else{
        //si les champs obligatoires sont rensignés alors test pour les autres champs (non obligatoires)
        if(empty($_POST["date_record"])){
            $date_record = NULL;
        }
        else{
            $date_record = $_POST["date_record"];
        }

        if(isset($_FILES['image'])){
            $image_file = $_FILES["image"];
            $file = $image_file["name"];
            // on sauvegade l'image dans le dossier img
            move_uploaded_file($image_file["tmp_name"],__DIR__ . "/img/".$image_file["name"]);
        }else{
            $file = NULL;
        }

        if(empty($_POST["piscine"])){
            $piscine = NULL;
        }
        else{
            $piscine = $_POST["piscine"];
        }

        try{
            require_once('header.php');
            // on recupère l'id de l'athlete selectionné par l'user dans la liste déroulante
            $rq_id_athlete = $bdd->prepare('SELECT id FROM athletes WHERE nom = ?');
            $rq_id_athlete->execute(array($_POST["athlete"]));
            $id_athlete = $rq_id_athlete->fetch();
            
            // on insert les données du record dans la table records
            $requete_insertion = $bdd->prepare('INSERT INTO records (distance, nage, temps, competition, piscine, date_record, img_arborescence, id_athlete, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $requete_insertion->bindParam(1, $_POST["distance"], PDO::PARAM_INT);
            $requete_insertion->bindParam(2, $_POST["nage"], PDO::PARAM_STR);
            $requete_insertion->bindParam(3, $_POST["temps"], PDO::PARAM_STR);
            $requete_insertion->bindParam(4, $_POST["competition"], PDO::PARAM_STR);
            $requete_insertion->bindParam(5, $piscine, PDO::PARAM_STR);
            $requete_insertion->bindParam(6, $date_record, PDO::PARAM_STR);
            $requete_insertion->bindParam(7, $file, PDO::PARAM_STR);
            $requete_insertion->bindParam(8, $id_athlete["id"], PDO::PARAM_INT);
            $requete_insertion->bindParam(9, $_SESSION["id"], PDO::PARAM_INT);
            $requete_insertion->execute();
            header('Location: page_blog.php');
        }
        catch(PDOException $e){
            echo "Erreur: ".$e->getMessage();
        }

    }
}
?>