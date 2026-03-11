<?php
$annuaire = ["Maxime"];
$annuaire[] = "Mourtada";
$annuaire[] = "Sophie";

$motDePasseAdmin = "Tyrolium2026";
$ageMinimum = 18;

function afficherBadge($nom, $statut)
{
    echo "Badge généré : $nom - Statut : $statut" . "<br>";
}

if (isset($_POST["prenom"])) {
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $code = $_POST["code"];
    $statut = $_POST["statut"];

    if ($age >= $ageMinimum && $code == $motDePasseAdmin) {
        $annuaire[] = $prenom;
        echo "Bienvenue, $prenom a été ajouté !<br>";
    } elseif ($age < $ageMinimum || $statut == "Stagiaire") {
        echo "Erreur : Accès non autorisé pour ce profil.<br>";
    } else {
        echo "Erreur : Mot de passe administrateur incorrect.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Evaluation Finale</title>
</head>

<body>
    <form action="evaluation_finale.php" method="POST">
        <label>Prénom</label><br>
        <input type="text" name="prenom" placeholder="Votre prénom"><br>
         <br>
        <label>Âge</label><br>
        <input type="number" name="age" placeholder="Votre âge"><br>
         <br>
        <label>Mot de passe</label><br>
        <input type="password" name="code"><br>
        <br>
        <label>Statut</label><br>
        <select name="statut">
            <option value="Stagiaire">Stagiaire</option>
            <option value="Employé">Employé</option>
        </select><br><br>

        <button type="submit">Ajouter au répertoire</button>
    </form>

    <h3>Annuaire de l'entreprise</h3>
    <?php
    foreach ($annuaire as $employe) {
        afficherBadge($employe, "Employé");
    }

    for ($i = 0; $i < 3; $i++) {
        echo "Emplacement bureau vide disponible..." . "<br>";
    }

    $chargement = 0;
    while ($chargement < 2) {
        echo "Synchronisation de la base de données..." . "<br>";
        $chargement++;
    }
    ?>
</body>

</html>