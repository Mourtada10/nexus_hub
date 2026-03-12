<form method="POST" action="ajouter.php">
    <input type="text" name="nom" placeholder="Nom">
    <input type="number" name="age" placeholder="Âge">
    <select name="role">
        <option value="Employé">Employé</option>
        <option value="Manager">Manager</option>
        <option value="Directeur">Directeur</option>
    </select>
    <button type="submit">Ajouter</button>
</form>
<?php if (!empty($messageErreur)) echo "<p style='color:red;'>$messageErreur</p>"; ?>