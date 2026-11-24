<?php
require_once __DIR__ . '/../Models/Computer.php';

class HomeController {
    public function index(): void {
        $computerModel = new Computer();
        $totalComputers = $computerModel->countAll();
        $totalOsCount = $computerModel->countDistinctOs();

        require_once __DIR__ . '/../Views/home.php';
    }
}