<table border="1">
    <tr>
        <th>Nom</th>
        <th>Âge</th>
        <th>Rôle</th>
        <th>Action</th>
    </tr>
    <?php foreach ($collaborateurs as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c->getNom()) ?> <?= $c->getRole() == "Directeur" ?: "" ?></td>
            <td><?= htmlspecialchars($c->getAge()) ?></td>
            <td><?= htmlspecialchars($c->getRole()) ?></td>
            <td><a href="index.php?delete=<?= $c->getId() ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
</table>