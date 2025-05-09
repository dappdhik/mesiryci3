<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Barang_model'); // Tambahkan ini
    }

    public function tampilan()
    {
        // get_all_barang
        $data = array(
            'halaman' => 'pagedata/v_barang',
            'kasir' => 'pagedata/v_kasir',
            'mhs' => $this->Barang_model->barangsemua() // Kirim data ke view
        );
        $this->load->view('v_tampilan', $data);
    }
}