<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/header', ['title' => 'Register']);
            $this->load->view('auth/register');
            $this->load->view('layouts/footer');
            return;
        }

        $this->load->model('User_model');
        $this->User_model->create_user($this->input->post('email'), password_hash($this->input->post('password'), PASSWORD_BCRYPT));
        redirect('login');
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/header', ['title' => 'Login']);
            $this->load->view('auth/login');
            $this->load->view('layouts/footer');
            return;
        }

        $this->load->model('User_model');
        $user = $this->User_model->find_by_email($this->input->post('email'));
        if ($user && password_verify($this->input->post('password'), $user->password_hash)) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('/');
        }

        $this->session->set_flashdata('error', 'Invalid credentials');
        redirect('login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}
