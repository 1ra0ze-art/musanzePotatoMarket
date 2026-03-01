<?php
// app/models/User.php
// Handles all database operations for the users table

class User {
    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    // Find a user by username (used during login)
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>