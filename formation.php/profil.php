<?php
$prenom = "Maxime";
$entreprise = "Tyrolium";
$annee = 2026;

echo "Formateur : $prenom <br>";
echo "Structure : $entreprise <br>";
echo "Année : $annee <br>";
?>

<?php
$age = 21; 
$role = "";
$motDePasse = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role"];
    $motDePasse = $_POST["password"];
    $age = $_POST["age"];

    if ($motDePasse == "secret123") {
        echo "Mot de passe correct <br>";
    } else {
        echo "Mot de passe incorrect <br>";
    }

    if ($motDePasse == "secret123" && $age >= 18) {
        echo "Acces complet autorisé <br>";
    } elseif ($motDePasse == "secret123" && $age < 18) {
        echo "Acces restreint (mineur)<br>";
    } else {
        echo "Acces refusé <br>";
    }

    if ($role == "admin" || $role == "employé") {
        echo "Vous avez acces au reseau d'entreprise <br>";
    } else {
        echo "Vous etes sur le reseau invité <br>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>

<body>
    <form method="POST" action="">
        <label for="role">Ton rôle :</label>
        <input type="text" name="role">
        <br>
        <label for="password">Ton mot de passe :</label><br>
        <input type="password" name="password">
        <br>
        <label for="age">Ton age :</label><br>
        <input type="number" name = "age">
        <br><br>
        <button type="submit">Envoyez</button>
    </form>
</body>

</html>