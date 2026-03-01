<?php
// app/models/Order.php
// Handles all database operations for orders table

class Order {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    // Get all orders with supplier name
    public function getAll() {
        return $this->db->query("
            SELECT o.*, s.full_name AS supplier_name
            FROM orders o
            JOIN suppliers s ON o.supplier_id = s.id
            ORDER BY o.created_at DESC
        ")->fetchAll();
    }

    // Get one order with full details
    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT o.*, s.full_name, s.phone, s.location AS supplier_location,
                   s.national_id, u.username AS created_by_name
            FROM orders o
            JOIN suppliers s ON o.supplier_id = s.id
            LEFT JOIN users u ON o.created_by = u.id
            WHERE o.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Create a new order, returns new order ID
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO orders (supplier_id, pickup_location, order_date, total_amount, created_by)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['supplier_id'],
            $data['pickup_location'],
            $data['order_date'],
            $data['total_amount'],
            $data['created_by']
        ]);
        return $this->db->lastInsertId();
    }

    // Count orders today
    public function countToday() {
        return $this->db->query("
            SELECT COUNT(*) as cnt FROM orders
            WHERE DATE(created_at) = CURDATE()
        ")->fetch()['cnt'];
    }

    // Total revenue today
    public function revenueToday() {
        return $this->db->query("
            SELECT COALESCE(SUM(total_amount), 0) as val FROM orders
            WHERE DATE(created_at) = CURDATE()
        ")->fetch()['val'];
    }

    // Total all-time orders
    public function countAll() {
        return $this->db->query("SELECT COUNT(*) as cnt FROM orders")->fetch()['cnt'];
    }

    // Recent orders for dashboard
   public function getRecent($limit = 10) {
    $limit = intval($limit);
    $stmt = $this->db->query("
        SELECT o.*, s.full_name AS supplier_name
        FROM orders o
        JOIN suppliers s ON o.supplier_id = s.id
        ORDER BY o.created_at DESC
        LIMIT $limit
    ");
    return $stmt->fetchAll();
}
}
?>