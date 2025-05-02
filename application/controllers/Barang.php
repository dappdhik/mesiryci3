<?php
class Barang extends CI_Controller{
    public function index(){
        $data   = array(
            'halaman'   => 'pagedata/v_barang',
            'kasir' => 'pagedata/v_kasir',
        );
        $this->load->view('v_tampilan', $data);
    }
}
?>