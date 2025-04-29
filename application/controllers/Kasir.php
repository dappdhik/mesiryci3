<?php
class Kasir extends CI_Controller{
    public function index(){
        $data   =   array(
            'judul'     => 'Kasir Sederhana',
            'footer'    => '@ Kasir Sederhana 2025',
            'halaman'   => 'pagedata/v_halaman',
        );
        $this->load->view('v_tampilan', $data);
    }
    public function gudang(){
        $data   =   array(
            'judul'     => 'Gudang',
            'footer'    => '@ Kasir Sederhana 2025',
            'halaman'   => 'pagedata/v_gudang'
        );
        $this->load->view('v_tampilan', $data);
    }
    public function halamkasir(){
        $data   =   array(
            'judul'     => 'kasir',
            'footer'    =>  '@ Kasir Sederhana 2025',
            'halaman'   =>  'pagedata/v_kasir',
        );
        $this->load->view('v_tampilan', $data);
    }
}
?>