<?php
// 1️⃣ CONFIGURATION DE LA BASE DE DONNÉES
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "Tada2004$";

// 2️⃣ CONNEXION À LA BASE DE DONNÉES
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erreur : impossible de se connecter à la base de données !";
} else {
    // 3️⃣ RÉCUPÉRER TOUS LES CONTACTS
    $query = "SELECT * FROM contacts";
    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Erreur : impossible de récupérer les contacts !";
    } else {
        // Vérifie s'il y a des contacts
        if (pg_num_rows($result) == 0) {
            echo "<li>Aucun contact trouvé.</li>";
        } else {
            echo "<h2>Liste des contacts :</h2>";
            echo "<ul>";
            while ($contact = pg_fetch_assoc($result)) {
                echo "<li>Nom : " . htmlspecialchars($contact['nom']) .
                    " - Numéro : " . htmlspecialchars($contact['numero']) . "</li>";
            }
            echo "</ul>";
        }
    }

    // 4️⃣ FERMER LA CONNEXION
    pg_close($conn);
}
