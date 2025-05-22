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
    public function delete($id)
    {
        $this->load->model('Barang_model');
        $this->Barang_model->delete_barang($id);
        redirect('admin'); 
    }

    public function update_barang($id)
    {
        $barang = $this->Barang_model->get_barang_by_id($id); 
    
        $gambar = $barang->gambar_barang;
    
        if ($this->input->post('hapus_gambar') == 1 && !empty($gambar)) {
            $path = './uploadsgambar/' . $gambar;
            if (file_exists($path)) {
                unlink($path);
            }
            $gambar = null;
        }
    
        if (!empty($_FILES['gambar']['name'])) { 
            $config['upload_path']   = './uploadsgambar/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
    
                if (!empty($barang->gambar_barang)) {
                    $old_path = './uploadsgambar/' . $barang->gambar_barang;
                    if (file_exists($old_path)) {
                        unlink($old_path);
                    }
                }
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }
    
        $data = array(
            'nama_barang'   => $this->input->post('nama_barang'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
            'kategori'      => $this->input->post('kategori'),
            'gambar_barang' => $gambar
        );
    
        $this->Barang_model->update_barang($id, $data);
        redirect('admin');
    }
    
}
?>