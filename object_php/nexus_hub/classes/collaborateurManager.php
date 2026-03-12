<?php
require_once 'Collaborateurs.php';

class CollaborateurManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM collaborateurs ORDER BY id DESC");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Collaborateur($row['nom'], $row['age'], $row['role'], $row['id']);
        }
        return $result;
    }

    public function add(Collaborateur $c)
    {
        $stmt = $this->pdo->prepare("INSERT INTO collaborateurs (nom, age, role) VALUES (:nom, :age, :role)");
        $stmt->execute([
            ':nom' => $c->getNom(),
            ':age' => $c->getAge(),
            ':role' => $c->getRole()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM collaborateurs WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function search($motCle)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM collaborateurs WHERE nom ILIKE :mc OR role ILIKE :mc ORDER BY id DESC");
        $stmt->execute([':mc' => "%$motCle%"]);
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Collaborateur($row['nom'], $row['age'], $row['role'], $row['id']);
        }
        return $result;
    }
}
