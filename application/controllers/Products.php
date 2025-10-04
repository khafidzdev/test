<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function index() {
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('layouts/header', ['title' => 'All Products']);
        $this->load->view('products/index', $data);
        $this->load->view('layouts/footer');
    }

    public function show($id) {
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product_by_id($id);
        if (!$product) show_404();
        $this->load->view('layouts/header', ['title' => $product->name]);
        $this->load->view('products/show', ['product' => $product]);
        $this->load->view('layouts/footer');
    }
}
