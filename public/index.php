<?php
// public/index.php
// THE ROUTER — every request comes through here

session_start();

// -----------------------------------------------
// CONSTANTS — define paths so every file can find each other
// -----------------------------------------------
define('ROOT', dirname(__DIR__) . '/');
define('APP',  ROOT . 'app/');

// -----------------------------------------------
// AUTOLOADER — automatically loads models & controllers
// -----------------------------------------------
spl_autoload_register(function ($class) {
    $locations = [
        APP . 'models/'      . $class . '.php',
        APP . 'controllers/' . $class . '.php',
    ];
    foreach ($locations as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Manually load all models first so controllers can use them
require_once APP . 'models/User.php';
require_once APP . 'models/Supplier.php';
require_once APP . 'models/Order.php';
require_once APP . 'models/OrderItem.php';

// -----------------------------------------------
// LOAD CONFIG
// -----------------------------------------------
require_once ROOT . 'config/database.php';

// -----------------------------------------------
// HELPER FUNCTIONS
// -----------------------------------------------

// Redirect to any URL
function redirect($url) {
    header("Location: $url");
    exit;
}

// Protect pages — redirect to login if not logged in
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        redirect('?page=login');
    }
}

// -----------------------------------------------
// ROUTER — reads ?page= from URL and calls controller
// -----------------------------------------------
$page = $_GET['page'] ?? 'login';

switch ($page) {

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'suppliers':
        $controller = new SupplierController();
        $controller->index();
        break;

    case 'suppliers-edit':
        $controller = new SupplierController();
        $controller->edit();
        break;    

    case 'orders':
        $controller = new OrderController();
        $controller->create();
        break;

    case 'receipt':
        $controller = new ReceiptController();
        $controller->show();
        break;

    default:
        // Unknown page — redirect to login
        redirect('?page=login');
        break;
}
?>