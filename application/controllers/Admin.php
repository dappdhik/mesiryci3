<?php
class admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }


    public function index(){
        $data   = array(
            'judul'     => 'Selamat Datang',
            'footer'    => '@ admin 2025',
            'halaman'   => 'admin/v_semua',
            'barang'    => $this->Barang_model->get_all_barang(),
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
    public function tampiledit(){
        $data   = array(
            'halaman' => 'admin/v_edit',
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function detail($id_barang){
        $data   = array(
            'halaman'   => 'admin/v_detail',
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function delete($id_barang){
        $this->load->model('Barang_model');
         $deleted = $this->Barang_model->delete_barang($id_barang);

    if ($deleted) {
        // Jika berhasil hapus, beri flashdata sukses
        $this->session->set_flashdata('success', 'Barang berhasil dihapus.');
    } else {
        // Jika gagal hapus
        $this->session->set_flashdata('error', 'Gagal menghapus barang.');
    }
        // Redirect kembali ke halaman admin atau daftar barang
    redirect('admin');
    }

}
?>