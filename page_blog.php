<!-- Page d'accueil "blog" du site -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_page_blog.css">
    <title>Blog</title>
</head>
<body>
    <header>
        <nav class="menu">
            <div class="accueil">
                
                <?php
                // démarrer la session si pas déjà active : test si la session n'est pas active
                if (session_status () != PHP_SESSION_ACTIVE) {
                    session_start();
                }
                // test si l'user est en mode visiteur
                if ($_SESSION['prenom'] == "visiteur") { ?>
                    <!-- Affichage de "Vous êtes en mode visiteur" si l'utilisateur est en mode visiteur -->
                    <h1>Vous êtes en mode visiteur</h1>
                <?php } else { ?>
                    <!-- Affichage de "Bonjour" suivi du nom de l'utilisateur -->
                    <h1>Bonjour <?php echo $_SESSION['prenom']; ?></h1>
                <?php } ?>
                
            </div>
            <div class="deconnexion">
                <!-- Bouton de déconnexion  et de redirection vers deconnexion.php -->
                <a href="deconnexion.php">Déconnexion</a>
            </div>
        </nav>
    </header>
    
    <?php 
    require_once('header.php'); 
    if ($bdd) {
        // requête pour récupérer les articles
        $requete = $bdd->prepare("SELECT * from records");
        $requete->execute();
        $resultatRequete = $requete->fetchAll(PDO::FETCH_ASSOC);

        // boucle pour afficher chaque élément de chaque record
        foreach ($resultatRequete as $record) {
            ?>
            <div class = "article"> 
                <!-- affichage élément par élément -->
                <img src="img/<?php echo $record['img_arborescence']; ?>" alt="image">
                <?php echo $record['distance'] ?>
                <?php echo $record['nage'] ?>
                <?php echo $record['temps'] ?>
                <?php echo $record['competition'] ?>
                <?php echo $record['piscine'] ?>
                <?php echo $record['date_record'] ?>
            </div>
            <?php
        }
    }
    ?>
    </br>
    <?php
    // test si l'utilisateur est en mode visiteur car si c'est le cas il ne peut pas ajouter de record
    // donc ne peut pas accéder au bouton "Ajouter un record"
    if ($_SESSION['prenom'] != "visiteur") { ?> 
        <div class="ajt_record">
            <form action="creation_record.php">
                <button class>Ajouter un record</button>
            </form>
        </div>
    <?php } ?>
    <p></p>
    <?php 
    //test si l'user est un visiteur car si c'est le cas alors..
    //.. il ne peut pas suprimer de record car il n'a pas de compte
    if ($_SESSION['prenom'] != "visiteur") { ?>
        <a href="suppression_record.php">Vous voulez supprimer un de vos records ?</a>
    <?php } ?>    
</body>
</html>