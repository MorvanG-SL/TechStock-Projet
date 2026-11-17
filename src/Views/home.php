<?php require_once __DIR__ . '/layout/header.php'; ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="p-5 bg-white rounded-3 shadow-sm border">
            <h1 class="display-6 fw-bold text-dark">Supervision du Parc Informatique</h1>
            <p class="lead text-muted mb-4">
                Plateforme d'inventaire matériel et logiciel — Version V0 (MVP).
            </p>
            <div class="d-flex gap-2">
                <a href="index.php?action=computers" class="btn btn-primary btn-lg">
                    Consulter l'inventaire complet
                </a>
                <a href="http://10.29.160.9/adminer.php" target="_blank" class="btn btn-outline-secondary btn-lg">
                    Accès Base de données (Adminer)
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4 h-100">
            <div class="card-body">
                <h6 class="card-subtitle text-muted mb-2 text-uppercase fw-semibold" style="font-size: 0.8rem;">
                    Total Ordinateurs
                </h6>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="display-5 fw-bold text-dark">
                        <?= htmlspecialchars((string)($totalComputers ?? 0)); ?>
                    </span>
                    <span class="badge bg-primary-subtle text-primary fs-6 px-3 py-2 rounded-pill">Recensés</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-success border-4 h-100">
            <div class="card-body">
                <h6 class="card-subtitle text-muted mb-2 text-uppercase fw-semibold" style="font-size: 0.8rem;">
                    Systèmes Détectés
                </h6>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="display-5 fw-bold text-dark">
                        <?= htmlspecialchars((string)($totalOsCount ?? 0)); ?>
                    </span>
                    <span class="badge bg-success-subtle text-success fs-6 px-3 py-2 rounded-pill">Environnements</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-info border-4 h-100">
            <div class="card-body">
                <h6 class="card-subtitle text-muted mb-2 text-uppercase fw-semibold" style="font-size: 0.8rem;">
                    Environnement Serveur
                </h6>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold text-dark">Proxmox VE</div>
                        <small class="text-muted">PHP <?= phpversion(); ?></small>
                    </div>
                    <span class="badge bg-info-subtle text-info fs-6 px-3 py-2 rounded-pill">Actif</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layout/footer.php'; ?>