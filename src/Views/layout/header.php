<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStock — Gestion Parc Informatique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/html/Projet_TechStock/public/index.php?action=home">
                <span class="badge bg-primary rounded-pill">IT</span>
                TechStock
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link rounded-3 px-3 <?= ($_GET['action'] ?? 'home') === 'home' ? 'active bg-primary fw-semibold' : '' ?>" 
                           href="/html/Projet_TechStock/public/index.php?action=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-3 px-3 <?= in_array($_GET['action'] ?? '', ['computers', 'show']) ? 'active bg-primary fw-semibold' : '' ?>" 
                           href="/html/Projet_TechStock/public/index.php?action=computers">Tous les ordinateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-3 px-3 <?= ($_GET['action'] ?? '') === 'inventory' ? 'active bg-primary fw-semibold' : '' ?>" 
                           href="/html/Projet_TechStock/public/index.php?action=inventory">Inventaire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container flex-grow-1 pb-5">