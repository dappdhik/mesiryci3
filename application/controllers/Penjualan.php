<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
    }

    // Tampilkan halaman awal jika ada
    public function index()
    {
        $data = array(
            'halaman' => 'pagedata/v_penjualan',
        );
        $this->load->view('v_tampilan', $data);
    }

    // Simpan transaksi dari kasir
    public function simpan()
    {
        // Set header untuk JSON response
        header('Content-Type: application/json');
        
        try {
            // Ambil data JSON dari request
            $input = $this->input->raw_input_stream;
            $data = json_decode($input, true);
            
            // Validasi data
            if (!$data || !isset($data['items']) || empty($data['items'])) {
                echo json_encode(['status' => 'error', 'message' => 'Data tidak valid']);
                return;
            }

            // Mulai transaksi database
            $this->db->trans_start();

            // Data penjualan (sesuai struktur database yang ada)
            $penjualan = [
                'tanggal_penjualan' => date('Y-m-d'),
                'total' => $data['total']
            ];
            
            // Simpan penjualan dan ambil ID
            $id_penjualan = $this->Penjualan_model->simpan_penjualan($penjualan);

            // Siapkan data detail (tanpa harga_satuan karena tidak ada di database)
            $detail = [];
            foreach ($data['items'] as $item) {
                $detail[] = [
                    'id_penjualan' => $id_penjualan,
                    'id_barang' => $item['id'],
                    'qty' => $item['qty'],
                    'subtotal' => $item['subtotal']
                ];

                // Kurangi stok barang
                $this->Penjualan_model->kurangi_stok($item['id'], $item['qty']);
            }

            // Simpan detail penjualan
            $this->Penjualan_model->simpan_detail($detail);

            // Selesaikan transaksi
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Gagal menyimpan transaksi'
                ]);
            } else {
                echo json_encode([
                    'status' => 'success', 
                    'message' => 'Transaksi berhasil disimpan',
                    'id_penjualan' => $id_penjualan
                ]);
            }

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    // Menampilkan daftar riwayat penjualan
    public function riwayat()
    {
        $data = array(
            'halaman' => 'pagedata/v_riwayat',
            'penjualan' => $this->Penjualan_model->get_all_penjualan()
        );
        $this->load->view('v_tampilan', $data);
    }

    // Menampilkan detail penjualan berdasarkan ID
    public function detail($id)
    {
        // Ambil data penjualan
        $penjualan = $this->Penjualan_model->get_penjualan_by_id($id);
        
        // Ambil detail penjualan
        $detail = $this->Penjualan_model->get_detail_by_penjualan($id);
        
        $data = array(
            'halaman' => 'pagedata/v_detail_riwayat',
            'penjualan' => $penjualan,
            'detail' => $detail
        );
        $this->load->view('v_tampilan', $data);
    }
}
?>