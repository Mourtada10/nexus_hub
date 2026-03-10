<?php
if (isset($_POST["name"]) && isset($_POST["age"])) {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $poste = "Administrateur Sécurité réseau";
}

if (empty($name) || empty($age)) {
    echo "le formulaire est incomplet !";
} else {

    if ($age < 18) {
        echo "Désolé $name vous devez etre majeur pour rejoindre Tyrolium !";
    } else {
        echo "Félicitation $name ! Votre profil de $poste a été enrégistré.";
    }
}
