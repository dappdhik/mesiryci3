<?php
class Barang extends CI_Controller{

    public function __construct(){
        parent::__construct( );
        $this->load->model('Barang_model');
    }

    public function index(){
        $data   = array(
            'halaman'   => 'pagedata/v_barang',
            'kasir' => 'pagedata/v_kasir',
            'mhs'   =>  $this->Barang_model->barangsemua(),
        );
        $this->load->view('v_tampilan', $data);
    }
    public function makanan(){
        $data   = array(
            'halaman'   => 'pagedata/v_makanan',
            'kasir' => 'pagedata/v_kasir',
        );
        $this->load->view('v_tampilan', $data);
    }
    public function minuman(){
        $data   = array(
            'halaman'   => 'pagedata/v_minuman',
            'kasir' => 'pagedata/v_kasir',
        );
        $this->load->view('v_tampilan', $data);
    }

    public function inputb(){
        $data = array(
            // nama field dari database dimasukkan dari inputan
            'nama_barang'   => $this->input->post('nama'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
            
        );
        
    }
}
?>