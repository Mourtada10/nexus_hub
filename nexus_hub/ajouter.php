<?php
require_once 'config.php';
require_once 'classes/Collaborateurs.php';
require_once 'classes/CollaborateurManager.php';

$manager = new CollaborateurManager($pdo);
$messageErreur = '';

if (
    isset($_POST['nom'], $_POST['age'], $_POST['role']) &&
    !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['role'])
) {

    if ($_POST['age'] >= 18) {
        $collab = new Collaborateur($_POST['nom'], $_POST['age'], $_POST['role']);
        $manager->add($collab);
        header("Location: index.php");
        exit;
    } else {
        $messageErreur = "Âge minimum requis : 18 ans";
    }
}

include 'classes/templates/formulaire_ajout.php';
