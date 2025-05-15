<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model {

    //untuk ambil semu barang
    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }

    //untuk detail
    public function get_barang_by_id($id_barang) {
        return $this->db->where('id_barang', $id_barang)
            ->get('barang')
            ->row();
    }

    public function tambah_barang($form) {
        return $this->db->insert('barang', $form);
    }

    //untuk menghapus data
    public function delete_barang($id) {
        return $this->db->where('id_barang', $id)
            ->delete('barang');
    }
    public function ambil_makanan(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kategori', 'makanan');    //mengambil makanan
        return $this->db->get()->result();

    }
    public function ambil_minuman(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kategori', 'minuman');
        return $this->db->get()->result();
    }

    //update data
    public function update_data($data){
        $this->db->where('id_barang', $data['id_barang']);
        //update data 
        $this->db->update('barang', $data);
    }
}