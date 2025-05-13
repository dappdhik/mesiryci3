<?php 
class Penjualan extends CI_Controller{
    public function index(){
        $data   = array(
            'halaman'   => 'pagedata/v_penjualan',
        );
        $this->load->view('v_tampilan', $data);
    }
}

?>


<!-- untuk enampilkan riwayat -->