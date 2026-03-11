<?php
$annuaire = ["Maxime"];
$annuaire = ["Mourtada"];
$annuaire = ["Sophie"];

$motDePasseAdmin = "Tyrolium2026";
$ageMinimum = 18;


function afficherBadge($nom, $statut){
    echo "Badge généré : $nom - Statut : $statut" . "<br>";
}

if(isset($_POST["prenom"])){
        $prenom = $_POST["prenom"];
        $age = $_POST["age"];
        $code = $_POST["code"];
        $statut = $_POST["statut"];
    }
    if($age >= $ageMinimum && $code == $motDePasseAdmin){
        $annuaire = $prenom;
        echo "Bienvenue, $prenom a été ajouté !";
    } elseif($age < $ageMinimum || $statut == "Stagiaire"){
        echo "Erreur : Accès non autorisé pour ce profil.";
    } else{
        echo "Erreur : Mot de passe administrateur incorrect.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="evaluation_finale.php" method="POST">
        <label for="prenom">Prenom</label>
        <input type="text" name = "prenom" placeholder="Votre prenom"><br>

        <label for="age">Age</label>
        <input type="number" name = "age" placeholder="Votre age"><br>

        <label for="code">Votre mot de passe</label>
        <input type="password" name = "code" ><br>

        <label for="statut">Choisissez votre statut</label>
        <select name="statut">
            <option value="stagiaire">Stagiaire</option>
            <option value="employé">Employé</option>
        </select>

        <button type="submit">Ajouter au répertoire</button>
      
    </form>
    <h3>Annuaire de l'entreprise</h3>

    <?php 
    foreach($annuaire as $employe){
        afficherBadge($employe, "Employé");
    }

    for($i = 0; $i < 3; $i++){
        echo "Emplacement bureau vide disponible.";
    }

    $chargement = 0;
    while($chargement < 2){
        echo "Synchronisation de la base de données...";
        $chargement++;
    }
    ?>
</body>
</html>

