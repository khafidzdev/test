<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        if (!$this->session->userdata('user_id')) redirect('login');
        $this->load->view('layouts/header', ['title' => 'Vendor Dashboard']);
        $this->load->view('vendor/index');
        $this->load->view('layouts/footer');
    }

    public function createProduct() {
        if (!$this->session->userdata('user_id')) redirect('login');
        if ($this->input->method() === 'post') {
            $this->Product_model->create_product([
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => (float)$this->input->post('price'),
                'vendor_id' => (int)$this->session->userdata('user_id'),
            ]);
            redirect('vendor');
        }
        $this->load->view('layouts/header', ['title' => 'Create Product']);
        $this->load->view('vendor/create');
        $this->load->view('layouts/footer');
    }

    public function editProduct($id) {
        if (!$this->session->userdata('user_id')) redirect('login');
        $product = $this->Product_model->get_product_by_id($id);
        if (!$product || (int)$product->vendor_id !== (int)$this->session->userdata('user_id')) show_404();
        if ($this->input->method() === 'post') {
            $this->Product_model->update_product($id, [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => (float)$this->input->post('price')
            ]);
            redirect('vendor');
        }
        $this->load->view('layouts/header', ['title' => 'Edit Product']);
        $this->load->view('vendor/edit', ['product' => $product]);
        $this->load->view('layouts/footer');
    }
}
