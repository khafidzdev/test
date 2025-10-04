<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->view('layouts/header', ['title' => 'Checkout']);
        $this->load->view('checkout/index');
        $this->load->view('layouts/footer');
    }
}
