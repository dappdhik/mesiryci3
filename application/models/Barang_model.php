<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function get_all_barang()
    {
        return $this->db->get('barang')->result();
    }

    public function get_barang_by_id($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id])->row();
    }

    public function delete_barang($id)
    {
        $this->db->delete('barang', ['id_barang' => $id]);
    }

    public function update_barang($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function tambah_barang($data)
    {
        $this->db->insert('barang', $data);
    }

    public function ambil_makanan()
    {
        return $this->db->get_where('barang', ['kategori' => 'makanan'])->result();
    }

    public function ambil_minuman()
    {
        return $this->db->get_where('barang', ['kategori' => 'minuman'])->result();
    }

    // Search barang by nama_barang or harga
    public function search_barang($keyword)
    {
        $this->db->like('nama_barang', $keyword, 'both');
        $this->db->or_like('harga', $keyword, 'both');
        return $this->db->get('barang')->result();
    }
}
