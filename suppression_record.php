<?php
require_once('header.php');
session_start();
// récupérer les records crée par l'utilisateur
$requete = $bdd->prepare("SELECT * FROM records WHERE id_user = ?");
$requete->execute(array($_SESSION["id"]));
$resultatRequete = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Page de suppression de record -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suppression d'un record</title>
    </head>
    <body>
        <form action="traitement_suppression_record.php" method="POST">
            <h1 class="page_de_co">Suppression d'un record</h1>
            <div>
                <p>Choisir le record à supprimer *</p>
                <select name="record">
                    <!-- liste déroulante des records crée par l'user -->
                    <?php foreach($resultatRequete as $record){ ?>
                        <!-- affichage sous la forme temps - distance  nage - date du record -->
                        <option value="<?php echo $record["id"]; ?>"><?php echo $record["temps"]." - ".$record["distance"].$record["nage"]." - ".$record["date_record"]; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div>
                <input type="submit" name="envoi_suppression" value="Supprimer">
            </div>
        </form>
    </body>
</html>