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
            'makanan'   => $this->Barang_model->ambil_makanan(),    //mengambil kategori makanan
        );
        $this->load->view('v_tampilan', $data);
    }

    public function minuman()
    {
        $data = array(
            'halaman' => 'pagedata/v_minuman',
            'kasir' => 'pagedata/v_kasir',
            'minuman' => $this->Barang_model->ambil_minuman(), // mengambil kategori minuman
        );
        $this->load->view('v_tampilan', $data);
    }

    public function inputb()
    {
        
            $nama = $this->input->post('nama');
            $stok = $this->input->post('stok');
            $harga = $this->input->post('harga');
            $kategori = $this->input->post('kategori'); // Tambahkan kategori
            $gambar    = $_FILES['gambar'];
        if ($gambar == '') {
            # code...
            echo "tidak file gambar";
        }
        else {
            //configurasi untuk menaruh gambar
            $config['upload_path']          = 'uploadsgambar';
            //untuk type gambar
            $config['allowed_types']        = 'jpg|png|jpeg';
            //untuk maximum gambar
            $config['max_size']             = 2028;

            //mengload library
            $this->load->library('upload', $config);
                // $gambar = null;

            //jika upload gagal maka
            if (!$this->upload->do_upload('gambar')) {
                echo "tidak ada gambar";
            }
            else{
                //jika berhasil, maka nama gambar akan dikirim kedatabase
                $gambar = $this->upload->data('file_name');
            }
        }
        $form   = array(
            'nama_barang'   => $nama,
            'stok'          => $stok,
            'harga'         => $harga,
            'kategori'      => $kategori,
            // 'gambar_barang'        => $gambar,
        );

        if ($gambar !== null) {
            $data['gambar_barang'] = $gambar;
    }
        
        // Tambahkan proses insert
        $this->Barang_model->tambah_barang($form, 'barang');
        redirect('admin'); // Redirect setelah input
    }
}