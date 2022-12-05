<!-- Page d'affichage du changement de mot de passe
Avec un formulaire de 3 éléments et un bouton valider qui envoie vers
traitementFormulaireChangementMdp.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>
</head>
<body>
    <h1>Changement de mot de passe</h1>
    <form action="traitementFormulaireChangementMdp.php" method="POST">
        <label for="">Login (e-mail) </label>
        <input type="text" name="login">
        <p></p>
        <label for="">Nouveau mot de passe</label>
        <input type="password" name="nouveau_mot_de_passe">
        <p></p>
        <label for="">Confirmation du nouveau mot de passe</label>
        <input type="password" name="confirmation_nouveau_mot_de_passe">
        <input type="submit" name="envoi_changement_mdp">
    </form>
</body>
</html>