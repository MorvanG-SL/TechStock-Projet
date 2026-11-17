<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStock — Gestion Parc Informatique</title>
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/html/Projet_TechStock/public/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="d-flex flex-grow-1">
    <!-- Menu latéral -->
    <nav class="bg-dark text-white p-3 d-flex flex-column" style="width: 250px; min-height: 100vh;">
        <a href="/html/Projet_TechStock/public/index.php?action=home" class="navbar-brand fw-bold fs-4 text-white mb-4 text-decoration-none">
            TechStock V0
        </a>
        <ul class="nav nav-pills flex-column mb-auto gap-1">
            <li class="nav-item">
                <a href="/html/Projet_TechStock/public/index.php?action=home" class="nav-link text-white <?= ($_GET['action'] ?? 'home') === 'home' ? 'active' : '' ?>">
                    Accueil
                </a>
            </li>
            <li class="nav-item">
                <a href="/html/Projet_TechStock/public/index.php?action=computers" class="nav-link text-white <?= in_array($_GET['action'] ?? '', ['computers', 'show']) ? 'active' : '' ?>">
                    Tous les ordinateurs
                </a>
            </li>
            <li class="nav-item">
                <a href="/html/Projet_TechStock/public/index.php?action=inventory" class="nav-link text-white <?= ($_GET['action'] ?? '') === 'inventory' ? 'active' : '' ?>">
                    Inventaire logiciel
                </a>
            </li>
        </ul>
        <hr class="text-secondary">
        <div class="small text-secondary">
            Serveur : 10.29.160.9
        </div>
    </nav>

    <div class="flex-grow-1 d-flex flex-column">
        <main class="container-fluid p-4 flex-grow-1">