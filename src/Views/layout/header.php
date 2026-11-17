<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Parc Informatique</title>
    <!-- Bootstrap 5 CSS (Local Proxmox avec repli CDN si absent) -->
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/bootstrap.min.css" onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';">
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/dataTables.bootstrap5.min.css" onerror="this.onerror=null;this.href='https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css';">
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar horizontale -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/html/Projet_TechStock/public/index.php?action=home">TechStock</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] ?? 'home') === 'home' ? 'active' : '' ?>" href="/html/Projet_TechStock/public/index.php?action=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($_GET['action'] ?? '', ['computers', 'show']) ? 'active' : '' ?>" href="/html/Projet_TechStock/public/index.php?action=computers">Tous les ordinateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] ?? '') === 'inventory' ? 'active' : '' ?>" href="/html/Projet_TechStock/public/index.php?action=inventory">Inventaire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Début du conteneur principal de la page -->
    <div class="container flex-grow-1">