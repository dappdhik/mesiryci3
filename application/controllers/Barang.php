<?php
class Barang extends CI_Controller{
    public function index(){
        $data   = array(
            'halaman'   => 'pagedata/v_barang',
            'kasir' => 'pagedata/v_kasir',
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
}
?>