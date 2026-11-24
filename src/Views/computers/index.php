<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Parc Informatique</h2>
        <p class="text-muted mb-0">Liste complète des postes recensés</p>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="computersTable" class="table table-hover align-middle w-100">
                <thead class="table-light">
                    <tr>
                        <th>Nom machine</th>
                        <th>Modèle</th>
                        <th>OS</th>
                        <th>RAM</th>
                        <th>Processeur</th>
                        <th>Adresse IP</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($computers as $pc): ?>
                        <tr>
                            <td class="fw-bold"><?= htmlspecialchars($pc['id']); ?></td>
                            <td><?= htmlspecialchars(($pc['fabricant'] ?? '') . ' ' . ($pc['modele'] ?? '')); ?></td>
                            <td><span class="badge bg-secondary"><?= htmlspecialchars($pc['os_nom']); ?></span></td>
                            <td><?= htmlspecialchars($pc['memoire_ram_go']); ?> Go</td>
                            <td><?= htmlspecialchars($pc['processeur']); ?></td>
                            <td><code><?= htmlspecialchars($pc['adresse_ip'] ?? 'N/A'); ?></code></td>
                            <td class="text-end">
                                <a href="/html/Projet_TechStock/public/index.php?action=show&id=<?= urlencode($pc['id']); ?>" class="btn btn-sm btn-primary">
                                    Détails & Logiciels
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>