<?php
// app/models/Supplier.php
// Handles all database operations for the suppliers table

class Supplier {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    // Get all suppliers
    public function getAll() {
        return $this->db->query("SELECT * FROM suppliers ORDER BY registered_at DESC")->fetchAll();
    }

    // Get one supplier by ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Create a new supplier
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO suppliers (full_name, phone, location, national_id)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['full_name'],
            $data['phone'],
            $data['location'],
            $data['national_id']
        ]);
    }

    // Delete a supplier
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM suppliers WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Count total suppliers
    public function count() {
        return $this->db->query("SELECT COUNT(*) as cnt FROM suppliers")->fetch()['cnt'];
    }
    // Update a supplier
public function update($id, $data) {
    $stmt = $this->db->prepare("
        UPDATE suppliers 
        SET full_name = ?, phone = ?, location = ?, national_id = ?
        WHERE id = ?
    ");
    return $stmt->execute([
        $data['full_name'],
        $data['phone'],
        $data['location'],
        $data['national_id'],
        $id
    ]);
}
}
?>