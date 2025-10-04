<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    private $table = 'products';

    public function get_latest_products($limit = 12) {
        return $this->db->order_by('created_at', 'DESC')->limit($limit)->get($this->table)->result();
    }

    public function get_all_products() {
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result();
    }

    public function get_product_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function create_product(array $data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_product($id, array $data) {
        $this->db->where('id', $id)->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }
}
