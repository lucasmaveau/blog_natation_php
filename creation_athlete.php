<!-- Page d'ajout d'un athlète dans la base de données
Avec un formulaire de 3 éléments : Nom, Nationalité et Age et un bouton valider qui 
envoie vers traitement_ajout_athlete.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un Athlete</title>

</head> 
<body>
    <form action="traitement_ajout_athlete.php" method="POST">
        <div>
            <label for="">Nom</label>
            <input type="text" name="nom_a">
        </div>
        <div>
            <label for="">Nationalité</label>
            <input type="text" name="nationalite_a">
        </div>
        <div>
            <label for="">Age</label>
            <input type="text" name="age_a">
        </div>
        <div>
            <input type="submit" name="envoi_athlete"> 
        </div>
    </form>
</body> 
</html>