<?php 
// requete pour recuperer les noms des athletes 
require_once('header.php'); //on appelle le header pour se connecter à la base de données
$requete = $bdd->prepare("SELECT nom FROM athletes");
$requete->execute();
$resultatRequete = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Page d'ajout d'un record
formulaire de différentes caratctéristiques d'un record avec 
des input de différents types et des listes déroulantes -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un record</title>

</head> 
<body>
    <form action="traitement_ajout_record.php" method="POST" enctype="multipart/form-data">
        <h1 class="page_de_co">Ajout d'un record</h1>
        <h5> * (champ obligatoire) </h5>

        <div>
            <label for="file">Photo</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <p>Distance de nage *</p>
            <select name="distance">
                <option value="50">50m</option>
                <option value="100">100m</option>
                <option value="200">200m</option>
                <option value="400">400m</option>
                <option value="800">800m</option>
                <option value="1500">1500m</option>
            </select>
        </div>
        <div>
            <p>Choisir la nage *</p>
            <select name="nage">
                <option value="cr">Crawl</option>
                <option value="dos">Dos</option>
                <option value="br">Brasse</option>
                <option value="pap">Papillon</option>
                <option value="4n">4 Nages</option>
            </select>
        </div>
        <p></p>
        <div>
            <label for="">Temps *</label>
            <input type="text" name="temps">
        </div>
        <div>
            <p>Competition *</p>
            <select name="competition">
                <option valeur="JO">Jeux Olympiques</option>
                <option valeur="Monde">Championnat du Monde</option>
                <option valeur="Europe">Championnat d'Europe</option>
                <option valeur="Nation">Championnat National</option>
                <option valeur="Local">Meeting</option>
            </select>
        </div>
        <p></p>
        <div>
            <label for="">Piscine</label>
            <input type="text" name="piscine">
        </div>
        <p></p>
        <div>
            <label for="">Date du record</label>
            <input type="date" name="date_record">
        </div>
        <p></p>
        <div>
            <p>Athlete *</p>
            <!-- liste déroulante avec les noms des athletes -->
            <select name="athlete">
                <!-- boucle pour récupérer le nom de chaque athlète dans la base -->
                <?php foreach($resultatRequete as $athlete) { ?>
                    <option valeur="<?= $athlete['nom'] ?>"><?= $athlete['nom'] ?></option>     
                    <?php } ?>            
            </select>
            <p></p>
            <!-- lien pour ajouter un nouvel athlète et transfert vers la page creation_athlete.php -->
            <a href="creation_athlete.php">L'athlète n'est pas dans la liste ? Ajoutez-le dès maintenant !</a>  
        </div>  
        <div>
            <input type="submit" name="envoi_record"> 
        </div>
    </form>
</body> 
</html>