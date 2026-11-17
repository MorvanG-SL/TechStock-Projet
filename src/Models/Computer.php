<?php
require_once __DIR__ . '/AccesDB.php';

class Computer extends AccesDB {
    public function findAll(): array {
        $pdo = self::getConnexion();
        $stmt = $pdo->query('SELECT * FROM computers ORDER BY hostname ASC');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array {
        $pdo = self::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM computers WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function countAll(): int {
        $pdo = self::getConnexion();
        return (int) $pdo->query('SELECT COUNT(*) FROM computers')->fetchColumn();
    }

    public function countDistinctOs(): int {
        $pdo = self::getConnexion();
        return (int) $pdo->query('SELECT COUNT(DISTINCT os) FROM computers')->fetchColumn();
    }
}