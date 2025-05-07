<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public function get_all_barang()
    {
        return $this->db->get('barang')->result();
    }

    // Atau jika Anda ingin menggunakan nama 'barangsemua':
    public function barangsemua()
    {
        return $this->db->get('barang')->result();
    }

    public function get_by_kategori($id_kategori)
    {
        return $this->db->where('id_kategori', $id_kategori)
            ->get('barang')
            ->result();
    }

    public function tambah_barang($data)
    {
        return $this->db->insert('barang', $data);
    }
}
