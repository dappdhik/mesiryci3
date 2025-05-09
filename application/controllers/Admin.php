<?php
class admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function index(){
        $data   = array(
            'judul'     => 'Selamat Datang',
            'footer'    => '@ admin 2025',
            'halaman'   => 'admin/v_semua',
            'mhs'       => $this->Barang_model->barangsemua()
        );
        $this->load->view('admin/v_admin', $data);
    }
    // tampilan start
    public function makanan(){
        $data   = array(
            'halaman'   => 'pagedata/v_makanan',
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function minuman(){
        $data   = array(
            'halaman'   => 'pagedata/v_minuman',
        );
        $this->load->view('admin/v_admin', $data);
    }
    // tampilan end

    public function tampilinput(){
        $data   =array(
            'halaman' => 'admin/v_inputdata',
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function tampiledit($id_barang){
        $data   = array(
            'halaman' => 'admin/v_edit',
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function detail($id_barang){
        $data   = array(
            'halaman'   => 'admin/v_detail',
            'barang'       =>  $this->Barang_model->detail_barang($id_barang),
        );
        $this->load->view('admin/v_admin', $data);
    }

}
?>