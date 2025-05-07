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
    }

    public function tampilan()
    {
        $data   = array(
            'halaman'   => 'pagedata/v_barang',
            'kasir'     => 'pagedata/v_kasir'
        );
        $this->load->view('v_tampilan', $data);
    }
}
