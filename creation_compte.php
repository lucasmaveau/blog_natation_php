<!-- Page d'affichage de la création de compte
Avec un formulaire qui demande à l'utilisateur de remplir ces champs :
- Login (e-mail)
- Mot de passe
- Confirmation du mot de passe
- Nom
- Prénom
- Date de naissance
Une fois valider, le formulaire envoie vers traitementFormulaireCreationCompte.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importation du fichier css -->
    <link rel="stylesheet" href="style_page_inscription.css">
    <title>Formulaire d'inscription</title>

</head>
<body>

    <form action="traitementFormulaireInscription.php" method="POST">
        <h1 class="page_inscription">Inscription</h1>

        <div class="page_inscription_2">
            <label for="">Prénom </label>
            <input class="input_formulaire" type="text" name="prenom">
        </div>

        <div class="page_inscription_2">
            <label for="">Nom </label>
            <input class="input_formulaire" type="text" name="nom">
        </div>

        <div class="page_inscription_2">
            <label for="">Date de Naissance</label>
            <input class="input_formulaire" type="date" name="date_naissance">
        </div>

        <div class="page_inscription_2">
            <label for="">Adresse Mail</label>
            <input class="input_formulaire" type="text" name="email">
        </div>

        <div class="page_inscription_2">
            <label for="">Mot de passe</label>
            <input class="input_formulaire"type="password" name="mot_de_passe">
        </div>

        <div class="page_inscription_2">
            <label for="">Confirmation</label>
            <input class="input_formulaire"type="password" name="confirmation_mdp">
        </div>

        <div class="page_inscription_2">
            <input class="input_valider" type="submit" name="envoi_inscription">
        </div>
    </form>
    </body> 