<?php
// app/controllers/DashboardController.php
// Handles the dashboard page

class DashboardController {

    public function index() {
        requireLogin();

        $orderModel    = new Order();
        $supplierModel = new Supplier();

        $ordersToday    = $orderModel->countToday();
        $valueToday     = $orderModel->revenueToday();
        $totalOrders    = $orderModel->countAll();
        $totalSuppliers = $supplierModel->count();
        $recentOrders   = $orderModel->getRecent(10);

        require APP . 'views/dashboard/index.php';
    }
}
?>