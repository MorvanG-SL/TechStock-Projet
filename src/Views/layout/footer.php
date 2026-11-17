</main>

        <footer class="mt-auto py-3 bg-white border-top text-muted px-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center small">
                <div>
                    &copy; <?= date('Y'); ?> <strong>TechStock</strong> — BTS SIO (SISR / SLAM)
                </div>
                <div>
                    <span class="badge bg-secondary">V0 (MVP)</span>
                    <span class="ms-2">Serveur : Proxmox VE | PHP <?= phpversion(); ?></span>
                </div>
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
    </div>
</div>

<script src="/html/Projet_TechStock/public/js/jquery-3.7.0.min.js"></script>
<script src="/html/Projet_TechStock/public/js/bootstrap.bundle.min.js"></script>
<script src="/html/Projet_TechStock/public/js/jquery.dataTables.min.js"></script>
<script src="/html/Projet_TechStock/public/js/dataTables.bootstrap5.min.js"></script>
<script src="/html/Projet_TechStock/public/js/main.js"></script>
</body>
</html>