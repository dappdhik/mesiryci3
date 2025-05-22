<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }

    public function get_barang_by_id($id_barang) {
        return $this->db->where('id_barang', $id_barang)->get('barang')->row();
    }

    public function tambah_barang($form) {
        return $this->db->insert('barang', $form);
    }

    public function update_barang($id, $data) {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id_barang)
    {
        return $this->db->delete('barang', array('id_barang' => $id_barang));
    }

    public function ambil_makanan() {
        return $this->db->get_where('barang', ['kategori' => 'makanan'])->result();
    }

    public function ambil_minuman() {
        return $this->db->get_where('barang', ['kategori' => 'minuman'])->result();
    }
}
