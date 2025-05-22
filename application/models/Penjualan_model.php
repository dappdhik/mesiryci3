<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function simpan_penjualan($data)
    {
        // Insert ke tabel penjualan
        $this->db->insert('penjualan', $data);
        
        // Cek apakah insert berhasil
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // ambil ID transaksi terakhir
        } else {
            return false;
        }
    }

    public function simpan_detail($data)
    {
        // Insert batch ke tabel penjualan_detail
        $this->db->insert_batch('penjualan_detail', $data);
        
        return $this->db->affected_rows() > 0;
    }

    public function kurangi_stok($id_barang, $jumlah)
    {
        // Cek stok terlebih dahulu
        $this->db->select('stok');
        $this->db->where('id_barang', $id_barang);
        $barang = $this->db->get('barang')->row();
        
        if ($barang && $barang->stok >= $jumlah) {
            // Update stok jika mencukupi
            $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang');
            
            return $this->db->affected_rows() > 0;
        }
        
        return false; // Stok tidak mencukupi
    }

    public function get_all_penjualan()
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->order_by('id_penjualan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_detail_by_penjualan($id_penjualan)
    {
        $this->db->select('pd.id_detail, pd.id_penjualan, pd.id_barang, pd.qty, pd.subtotal, b.nama_barang, b.harga');
        $this->db->from('penjualan_detail pd');
        $this->db->join('barang b', 'b.id_barang = pd.id_barang');
        $this->db->where('pd.id_penjualan', $id_penjualan);
        return $this->db->get()->result();
    }
    
    public function get_penjualan_by_id($id_penjualan)
    {
        $this->db->where('id_penjualan', $id_penjualan);
        return $this->db->get('penjualan')->row();
    }
}