<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
    }

    public function index() {
        $data = array(
            'judul' => 'Selamat Datang Admin',
            'footer' => '@ admin 2025',
            'halaman' => 'admin/v_semua',
            'mhs' => $this->Barang_model->get_all_barang()
        );
        $this->load->view('admin/v_admin', $data);
    }

    public function makanan() {
        $data = array(
            'halaman' => 'admin/v_semua',
            'mhs' => $this->Barang_model->get_by_kategori('makanan')
        );
        $this->load->view('admin/v_admin', $data);
    }

    public function minuman() {
        $data = array(
            'halaman' => 'admin/v_semua',
            'mhs' => $this->Barang_model->get_by_kategori('minuman')
        );
        $this->load->view('admin/v_admin', $data);
    }

    public function tampilinput() {
        $data = array(
            'halaman' => 'admin/v_inputdata'
        );
        $this->load->view('admin/v_admin', $data);
    }

    public function inputb() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = file_get_contents($upload_data['full_path']);
        } else {
            $gambar = file_get_contents('./gambar/default.jpg');
        }

        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'kategori' => $this->input->post('kategori'),
            'gambar_barang' => $gambar
        );

        $this->Barang_model->tambah_barang($data);
        redirect('admin');
    }

    public function delete($id) {
        $this->Barang_model->delete_barang($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tampiledit($id) {
        $data = array(
            'halaman' => 'admin/v_edit',
            'barang' => $this->Barang_model->get_barang_by_id($id)
        );
        $this->load->view('admin/v_admin', $data);
    }

    public function detail($id) {
        $data = array(
            'halaman' => 'admin/v_detail',
            'barang' => $this->Barang_model->get_barang_by_id($id)
        );
        $this->load->view('admin/v_admin', $data);
    }
}
?>