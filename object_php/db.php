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
        // On récupère tous les résultats dans un tableau
        $contacts = pg_fetch_all($result);

        if (!$contacts) {
            echo "<li>Aucun contact trouvé.</li>";
        } else {
            echo "<h2>Liste des contacts :</h2>";
            echo "<ul>";
            // 4️⃣ Boucle foreach pour afficher chaque contact
            foreach ($contacts as $contact) {
                echo "<li>Nom : " . htmlspecialchars($contact['nom']) .
                    " - Numéro : " . htmlspecialchars($contact['numero']) . "</li>";
            }
            echo "</ul>";
        }
    }

    // 5️⃣ FERMER LA CONNEXION
    pg_close($conn);
}
