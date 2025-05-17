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
            'mhs' => $this->Barang_model->get_all_barang(),
        );
        $this->load->view('v_tampilan', $data);
    }

    public function makanan()
    {
        $data = array(
            'halaman' => 'pagedata/v_makanan',
            'kasir' => 'pagedata/v_kasir',
            'makanan' => $this->Barang_model->ambil_makanan(),
        );
        $this->load->view('v_tampilan', $data);
    }

    public function minuman()
    {
        $data = array(
            'halaman' => 'pagedata/v_minuman',
            'kasir' => 'pagedata/v_kasir',
            'minuman' => $this->Barang_model->ambil_minuman(),
        );
        $this->load->view('v_tampilan', $data);
    }

    public function inputb()
    {
        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');

        $gambar = null;
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './uploadsgambar/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            } else {
                echo "Upload gagal: " . $this->upload->display_errors();
                return;
            }
        }


        $form = array(
            'nama_barang'   => $nama,
            'stok'          => $stok,
            'harga'         => $harga,
            'kategori'      => $kategori,
            'gambar_barang' => $gambar
        );

        $this->Barang_model->tambah_barang($form);
        redirect('admin');
    }
}
