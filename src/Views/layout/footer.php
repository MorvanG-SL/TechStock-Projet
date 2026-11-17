</div> 

    <footer class="mt-auto py-3 bg-white border-top text-muted">
        <div class="container d-flex flex-wrap justify-content-between align-items-center small">
            <!-- Bloc gauche : Nom du projet et copyright -->
            <div class="d-flex align-items-center">
                <span>&copy; <?= date('Y'); ?> <strong>Parc Info</strong> — BTS SIO (SISR / SLAM)</span>
            </div>

            <!-- Bloc centre : Version et infrastructure -->
            <div>
                <span class="badge bg-secondary">V0 (MVP)</span>
                <span class="ms-2">Serveur : Proxmox VE | PHP <?= phpversion(); ?></span>
            </div>

            <!-- Bloc droit : Liens rapides d'administration -->
            <ul class="nav">
                <li class="nav-item">
                    <a href="http://10.29.160.9/adminer.php" target="_blank" class="nav-link px-2 text-muted">Adminer</a>
                </li>
                <li class="nav-item">
                    <a href="/html/Projet_TechStock/public/index.php?action=home" class="nav-link px-2 text-muted">Accueil</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- Scripts DataTables et Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="/html/Projet_TechStock/public/js/main.js"></script>
</body>
</html>