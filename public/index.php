<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Controllers/ComputerController.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'computers':
        $controller = new ComputerController();
        $controller->index();
        break;

    case 'show':
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $controller = new ComputerController();
        $controller->show($id);
        break;

    case 'inventory':
        $controller = new ComputerController();
        $controller->inventory();
        break;

    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}