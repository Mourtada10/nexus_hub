<?php
require_once 'config.php';
require_once 'classes/Collaborateurs.php';
require_once 'classes/CollaborateurManager.php';

$manager = new CollaborateurManager($pdo);

// Suppression
if (isset($_GET['delete'])) {
    $manager->delete($_GET['delete']);
    header("Location: index.php");
    exit;
}

// Recherche
$motCle = isset($_GET['search']) ? $_GET['search'] : '';
$collaborateurs = $motCle ? $manager->search($motCle) : $manager->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="classes/templates/assets/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "classes/templates/header.php"; ?> 

    <form method="GET">
        <input type="text" name="search" placeholder="Rechercher" value="<?= htmlspecialchars($motCle) ?>">
        <button type="submit">Rechercher</button>
    </form>

    <a href="ajouter.php">Ajouter un collaborateur</a><br><br>

    <?php include 'classes/templates/tableau_collaborateurs.php'; ?>
</body>

</html>
