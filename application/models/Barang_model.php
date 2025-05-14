<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model {

    //untuk ambil semu barang
    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }

    //untuk detail
    public function get_barang_by_id($id) {
        return $this->db->where('id_barang', $id)
            ->get('barang')
            ->row();
    }

    public function tambah_barang($data) {
        return $this->db->insert('barang', $data);
    }

    //untuk menghapus data
    public function delete_barang($id) {
        return $this->db->where('id_barang', $id)
            ->delete('barang');
    }
    public function ambil_makanan(){
        $this->db->select('*');
        $this->db->from('barang');

    }
    public function ambil_minuman(){
        $this->db->select('*');
        $this->db->from('barang');
    }

}