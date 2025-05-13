<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data = array(
            'halaman' => 'pagedata/v_barang',
            'kasir' => 'pagedata/v_kasir',
            'mhs' => $this->Barang_model->barangsemua(),
        );
        $this->load->view('v_tampilan', $data);
    }

    public function makanan()
    {
        $data = array(
            'halaman' => 'pagedata/v_makanan',
            'kasir' => 'pagedata/v_kasir',
            'makanan' => $this->Barang_model->get_by_kategori(1) // Kategori 1 untuk makanan
        );
        $this->load->view('v_tampilan', $data);
    }

    public function minuman()
    {
        $data = array(
            'halaman' => 'pagedata/v_minuman',
            'kasir' => 'pagedata/v_kasir',
            'minuman' => $this->Barang_model->get_by_kategori(2) // Kategori 2 untuk minuman
        );
        $this->load->view('v_tampilan', $data);
    }

    public function inputb()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('kategori') // Tambahkan kategori
        );
        
        // Tambahkan proses insert
        $this->Barang_model->tambah_barang($data);
        redirect('barang'); // Redirect setelah input
    }
}