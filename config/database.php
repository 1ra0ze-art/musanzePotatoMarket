<?php
// config/database.php
// Central database configuration — included everywhere via autoload

define('DB_HOST', 'sql311.infinityfree.com');
define('DB_NAME', 'if0_41288827_musanzemarket');
define('DB_USER', 'if0_41288827');
define('DB_PASS', 'Group4feb');

function getDB() {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("<h3 style='color:red'>Database connection failed: " . $e->getMessage() . "</h3>");
        }
    }

    return $pdo;
}
?>