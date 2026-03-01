<?php
// app/controllers/ReceiptController.php
// Handles receipt display

class ReceiptController {

    public function show() {
        requireLogin();

        $order_id  = intval($_GET['id'] ?? 0);
        if (!$order_id) { die("Invalid order ID."); }

        $orderModel = new Order();
        $itemModel  = new OrderItem();

        $order = $orderModel->getById($order_id);
        if (!$order) { die("Order not found."); }

        $items = $itemModel->getByOrderId($order_id);
        $isNew = isset($_GET['new']);

        require APP . 'views/receipt/show.php';
    }
}
?>