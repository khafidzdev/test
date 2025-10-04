<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index() {
        $this->load->view('layouts/header', ['title' => 'Your Cart']);
        $this->load->view('cart/index');
        $this->load->view('layouts/footer');
    }

    public function add($product_id) {
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product_by_id($product_id);
        if (!$product) show_404();
        $this->cart->insert([
            'id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
            'name' => $product->name,
        ]);
        redirect('cart');
    }

    public function remove($rowid) {
        $this->cart->update(['rowid' => $rowid, 'qty' => 0]);
        redirect('cart');
    }
}
