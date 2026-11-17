<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Parc Informatique</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <!-- Navbar horizontale -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php?action=home">Parc Info</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=computers">Tous les ordinateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=inventory">Inventaire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Début du conteneur principal de la page -->
    <div class="container">