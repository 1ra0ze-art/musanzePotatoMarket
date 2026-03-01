-- database/seed.sql
-- Default admin account (password: admin123)

USE musanze_potato;

INSERT IGNORE INTO users (username, password, role)
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');