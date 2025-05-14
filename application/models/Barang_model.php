<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }


    public function get_barang_by_id($id) {
        return $this->db->where('id_barang', $id)
            ->get('barang')
            ->row();
    }

    public function tambah_barang($data) {
        return $this->db->insert('barang', $data);
    }

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