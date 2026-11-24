<?php
// Reçoit le JSON envoyé par l'agent PowerShell et met à jour la base.
// Colonnes supposées d'après vos vues : computers(id, fabricant, modele, numero_serie,
// adresse_ip, os_nom, os_version, processeur, memoire_ram_go, disques_libre_go, date_inventaire)
// et software(computer_id, name, version, publisher).

require_once __DIR__ . '/../../src/Models/AccesDB.php';
require_once __DIR__ . '/../../config/api.php';

header('Content-Type: application/json; charset=utf-8');

function fail(int $code, string $msg): never {
    http_response_code($code);
    echo json_encode(['error' => $msg]);
    exit;
}

// Réutilise votre classe AccesDB (getConnexion est protected)
class InventoryDB extends AccesDB {
    public static function pdo(): PDO { return self::getConnexion(); }
}

function str(mixed $v, int $max = 255): ?string {
    if ($v === null || $v === '') return null;
    return mb_substr(trim((string) $v), 0, $max);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') fail(405, 'POST uniquement');

$token = $_SERVER['HTTP_X_API_TOKEN'] ?? '';
if (!hash_equals(API_TOKEN, $token)) fail(401, 'token invalide');

$raw = file_get_contents('php://input', false, null, 0, 5 * 1024 * 1024);
$d = json_decode($raw, true);
$id = str($d['hostname'] ?? null, 100);
if (!is_array($d) || $id === null) fail(400, 'JSON invalide ou hostname manquant');

$softwares = is_array($d['softwares'] ?? null) ? $d['softwares'] : [];

$pdo = InventoryDB::pdo();
try {
    $pdo->beginTransaction();

    $pdo->prepare(
        'INSERT INTO computers
           (id, fabricant, modele, numero_serie, adresse_ip, os_nom, os_version,
            processeur, memoire_ram_go, disques_libre_go, date_inventaire)
         VALUES
           (:id, :fabricant, :modele, :serie, :ip, :os_nom, :os_version,
            :cpu, :ram, :disques, NOW())
         ON DUPLICATE KEY UPDATE
           fabricant = VALUES(fabricant), modele = VALUES(modele),
           numero_serie = VALUES(numero_serie), adresse_ip = VALUES(adresse_ip),
           os_nom = VALUES(os_nom), os_version = VALUES(os_version),
           processeur = VALUES(processeur), memoire_ram_go = VALUES(memoire_ram_go),
           disques_libre_go = VALUES(disques_libre_go), date_inventaire = NOW()'
    )->execute([
        ':id'         => $id,
        ':fabricant'  => str($d['fabricant'] ?? null),
        ':modele'     => str($d['modele'] ?? null),
        ':serie'      => str($d['numero_serie'] ?? null),
        ':ip'         => str($d['adresse_ip'] ?? null, 45),
        ':os_nom'     => str($d['os_nom'] ?? null),
        ':os_version' => str($d['os_version'] ?? null),
        ':cpu'        => str($d['processeur'] ?? null),
        ':ram'        => isset($d['memoire_ram_go']) ? (float) $d['memoire_ram_go'] : null,
        ':disques'    => str($d['disques_libre_go'] ?? null, 500),
    ]);

    // Liste des logiciels : on remplace celle de ce poste par la liste à jour
    $pdo->prepare('DELETE FROM software WHERE computer_id = :id')->execute([':id' => $id]);
    $ins = $pdo->prepare(
        'INSERT INTO software (computer_id, name, version, publisher)
         VALUES (:id, :name, :version, :publisher)'
    );
    $count = 0;
    foreach ($softwares as $s) {
        $name = str($s['name'] ?? null);
        if ($name === null) continue;
        $ins->execute([
            ':id' => $id, ':name' => $name,
            ':version' => str($s['version'] ?? null),
            ':publisher' => str($s['publisher'] ?? null),
        ]);
        $count++;
    }

    $pdo->commit();
    echo json_encode(['status' => 'ok', 'computer' => $id, 'softwares' => $count]);
} catch (Throwable $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    error_log('inventory.php : ' . $e->getMessage());
    fail(500, 'erreur serveur');
}
