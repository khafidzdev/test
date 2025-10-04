<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->get_latest_products(12);
        $this->load->view('layouts/header', ['title' => 'Marketplace']);
        $this->load->view('home/index', $data);
        $this->load->view('layouts/footer');
    }
}
