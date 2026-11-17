<?php
require_once __DIR__ . '/../Models/Computer.php';
require_once __DIR__ . '/../Models/Software.php';

class ComputerController {
    public function index(): void {
        $computerModel = new Computer();
        $computers = $computerModel->findAll();

        require_once __DIR__ . '/../Views/computers/index.php';
    }

    public function show(string $id): void {
        $computerModel = new Computer();
        $softwareModel = new Software();

        $computer = $computerModel->findById($id);
        if (!$computer) {
            header('Location: /html/Projet_TechStock/public/index.php?action=computers');
            exit;
        }

        $softwares = $softwareModel->findByComputerId($id);

        require_once __DIR__ . '/../Views/computers/show.php';
    }

    public function inventory(): void {
        $softwareModel = new Software();
        $allSoftwares = $softwareModel->findAllWithComputer();

        require_once __DIR__ . '/../Views/computers/inventory.php';
    }
}