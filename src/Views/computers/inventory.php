<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="mb-4">
    <h2 class="fw-bold mb-0">Inventaire Logiciel Global</h2>
    <p class="text-muted">Ensemble des applications détectées sur l'ensemble du parc</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table id="inventoryTable" class="table table-hover align-middle w-100">
                <thead class="table-light">
                    <tr>
                        <th>Logiciel</th>
                        <th>Version</th>
                        <th>Éditeur</th>
                        <th>Poste associé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allSoftwares as $item): ?>
                        <tr>
                            <td class="fw-semibold"><?= htmlspecialchars($item['name']); ?></td>
                            <td><span class="badge bg-light text-dark border"><?= htmlspecialchars($item['version']); ?></span></td>
                            <td><?= htmlspecialchars($item['publisher']); ?></td>
                            <td>
                                <a href="/html/Projet_TechStock/public/index.php?action=show&id=<?= urlencode($item['computer_id']); ?>" class="text-decoration-none fw-bold">
                                    <?= htmlspecialchars($item['hostname']); ?>
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