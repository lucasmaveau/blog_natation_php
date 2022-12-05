<?php
//insert les données de creation_athlete dans la base de données 
if(isset($_POST['envoi_athlete'])){
    // test pour verifier si les champs de l'athlètes sont tous renseignés
    if (empty($_POST["nom_a"]) || empty($_POST["nationalite_a"]) || empty($_POST["age_a"])) {
        // si un des champs est vide, on affiche un message d'erreur
        echo "<script>alert('ERREUR : Tous les champs ne sont pas rensignés');</script>";
        header('Location: creation_athlete.php');
}
    else{
        try{
            require_once('header.php');
            //insert les données de creation_athlete dans la base de données
            $requete_insertion = $bdd->prepare('INSERT INTO athletes (nom, nationalite, age) VALUES (?, ?, ?)');
            $requete_insertion->execute(array($_POST["nom_a"], $_POST["nationalite_a"], $_POST["age_a"]));
            // puis on revient sur la page de création de record
            header('Location: creation_record.php');
        }
        catch(PDOException $e){
            echo "Erreur: ".$e->getMessage();
        }

    }
}
?>