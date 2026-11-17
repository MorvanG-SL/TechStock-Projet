<?php
require_once __DIR__ . '/AccesDB.php';

class Software extends AccesDB {
    public function findByComputerId(string $computerId): array {
        $pdo = self::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM software WHERE computer_id = :id ORDER BY name ASC');
        $stmt->execute(['id' => $computerId]);
        return $stmt->fetchAll();
    }

    public function findAllWithComputer(): array {
        $pdo = self::getConnexion();
        $sql = 'SELECT s.*, c.id AS hostname 
                FROM software s 
                INNER JOIN computers c ON s.computer_id = c.id 
                ORDER BY s.name ASC';
        return $pdo->query($sql)->fetchAll();
    }
}