<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importation du fichier css -->
    <link rel="stylesheet" href="style_page_co.css">
    <title>Page de Connexion au portail</title>

</head> 
<body>
    <!-- Formulaire de connexion -->
    <form action="traitementFormulaireConnexion.php" method="POST">
        <h1 class="page_de_co">Accès aux Records</h1>
        <div class="page_de_co2">
            <label for="">Login (e-mail) </label>
            <input class="input_formulaire" type="text" name="login">
        </div>
        <div class="page_de_co2">
            <label for="">Mot de passe</label>
            <input class="input_formulaire"type="password" name="mot_de_passe">
        </div>
        <div class="page_de_co2">
            <input class="input_valider" type="submit" name="envoi_connexion">
        </div>
        <!-- Lien vers la page de modification de mot de passe -->
        <div class="page_de_co3">
            <a href="changement_mdp.php">Mot de passe oublié</a>
        </div>
        <!-- Lien vers la page de création de compte -->
        <div class="page_de_co3">
            <a href="creation_compte.php">Vous n'avez pas encore de compte ? Créer-en un dès maintenant !</a>
        </div>
        <!-- Lien pour accéder à la page d'accueil en mode visiteur -->
        <div class="page_de_co3">
            <a href="page_traitement_visiteur.php">Accéder au site en mode visiteur</a>
        </div>
    </form>
</body> 
</html>