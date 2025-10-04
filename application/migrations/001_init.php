<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Init extends CI_Migration {
    public function up() {
        // users
        $this->db->query("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            created_at TEXT NOT NULL
        )");

        // products
        $this->db->query("CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT NOT NULL,
            price REAL NOT NULL,
            vendor_id INTEGER NOT NULL,
            created_at TEXT NOT NULL,
            FOREIGN KEY (vendor_id) REFERENCES users(id)
        )");

        // seed sample data
        $now = date('Y-m-d H:i:s');
        $password = password_hash('password', PASSWORD_BCRYPT);
        $this->db->insert('users', ['email' => 'vendor@example.com', 'password_hash' => $password, 'created_at' => $now]);
        $vendorId = $this->db->insert_id();
        for ($i = 1; $i <= 8; $i++) {
            $this->db->insert('products', [
                'name' => 'Sample Product ' . $i,
                'description' => 'This is a sample product #' . $i . ' for demo.',
                'price' => rand(1000, 10000) / 100,
                'vendor_id' => $vendorId,
                'created_at' => $now,
            ]);
        }
    }

    public function down() {
        $this->db->query('DROP TABLE IF EXISTS products');
        $this->db->query('DROP TABLE IF EXISTS users');
    }
}
