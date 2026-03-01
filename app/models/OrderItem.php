<?php
// app/models/OrderItem.php
// Handles order items (the individual rows per order)

class OrderItem {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    // Get all items for a specific order
    public function getByOrderId($order_id) {
        $stmt = $this->db->prepare("SELECT * FROM order_items WHERE order_id = ?");
        $stmt->execute([$order_id]);
        return $stmt->fetchAll();
    }

    // Add one item to an order
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO order_items (order_id, description, quantity, unit_price)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['order_id'],
            $data['description'],
            $data['quantity'],
            $data['unit_price']
        ]);
    }
}
?>