<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    private $table = 'users';

    public function create_user($email, $password_hash) {
        $this->db->insert($this->table, [
            'email' => $email,
            'password_hash' => $password_hash,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->db->insert_id();
    }

    public function find_by_email($email) {
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }
}
