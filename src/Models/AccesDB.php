<?php
require_once __DIR__ . '/../../config/database.php';

abstract class AccesDB {
    protected static function getConnexion(): PDO {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $pdo;
        } catch (PDOException $e) {
            die('<strong>Erreur de connexion Base de Données :</strong> ' . htmlspecialchars($e->getMessage()));
        }
    }
}