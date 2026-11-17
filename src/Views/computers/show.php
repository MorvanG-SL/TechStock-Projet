<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="mb-4">
    <a href="index.php?action=computers" class="btn btn-outline-secondary btn-sm mb-3">
        &larr; Retour à la liste des ordinateurs
    </a>
    <h2 class="fw-bold mb-0">Fiche Poste : <?= htmlspecialchars($computer['hostname']); ?></h2>
    <p class="text-muted">Dernière remontée : <?= htmlspecialchars($computer['last_seen']); ?></p>
</div>

<!-- Caractéristiques matérielles -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Configuration Matérielle & Système</div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <small class="text-muted d-block">Utilisateur principal</small>
                <strong><?= htmlspecialchars($computer['username']); ?></strong>
            </div>
            <div class="col-md-4">
                <small class="text-muted d-block">Système d'exploitation</small>
                <strong><?= htmlspecialchars($computer['os']); ?></strong>
            </div>
            <div class="col-md-4">
                <small class="text-muted d-block">Adresse IP</small>
                <code><?= htmlspecialchars($computer['ip_address']); ?></code>
            </div>
            <div class="col-md-6">
                <small class="text-muted d-block">Processeur (CPU)</small>
                <strong><?= htmlspecialchars($computer['cpu']); ?></strong>
            </div>
            <div class="col-md-6">
                <small class="text-muted d-block">Mémoire Vive (RAM)</small>
                <strong><?= htmlspecialchars($computer['ram']); ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Liste des logiciels installés -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
        <span>Logiciels installés (<?= count($softwares); ?>)</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="softwaresTable" class="table table-striped align-middle w-100">
                <thead class="table-light">
                    <tr>
                        <th>Nom du logiciel</th>
                        <th>Version</th>
                        <th>Éditeur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($softwares as $soft): ?>
                        <tr>
                            <td class="fw-semibold"><?= htmlspecialchars($soft['name']); ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($soft['version']); ?></span></td>
                            <td><?= htmlspecialchars($soft['publisher']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>