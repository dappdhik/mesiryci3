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
            'makanan'   => $this->Barang_model->ambil_makanan(),
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function minuman(){
        $data   = array(
            'halaman'   => 'pagedata/v_minuman',
            'minuman'   => $this->Barang_model->ambil_minuman(),
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
            'barang'    => $this->Barang_model->Get_barang_by_id($id_barang),
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function detail($id_barang){
        $data   = array(
            'halaman'   => 'admin/v_detail',
            'barang'    => $this->Barang_model->Get_barang_by_id($id_barang),
        );
        $this->load->view('admin/v_admin', $data);
    }
    public function delete($id_barang){
        $this->load->model('Barang_model');
         $deleted = $this->Barang_model->delete_barang($id_barang);

    if ($deleted) {
        $this->session->set_flashdata('success', 'Barang berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus barang.');
    }
    redirect('admin');
    }

    //update barang
    public function update_barang($id_barang){
        $data = array(
            'id_barang'     => $id_barang,
            'nama_barang'   => $this->input->post('nama_barang'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
            'kategori'      => $this->input->post('kategor'),

        );
        $this->Barang_model->update_data($data);
        redirect('admin');
    }

}
?>