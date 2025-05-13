<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('kasir/tampilan');
        }

        if ($this->input->post('username') && $this->input->post('password')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->User_model->check_login($username, $password)) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('username', $username);

                redirect('kasir/tampilan');
            } else {
                $this->session->set_flashdata('error', 'Login gagal, username atau password salah!');
                redirect('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
