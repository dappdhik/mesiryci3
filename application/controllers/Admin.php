<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$q = $this->input->get('q'); // ambil parameter pencarian (jika ada)
		if ($q) {
			$barang = $this->Barang_model->search_barang($q);
		} else {
			$barang = $this->Barang_model->get_all_barang();
		}

		$data = [
			'judul'   => 'Selamat Datang',
			'footer'  => '@ admin 2025',
			'halaman' => 'admin/v_semua',
			'barang'  => $barang,
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function makanan()
	{
		$data = [
			'halaman' => 'admin/kategori/v_makanan',
			'makanan' => $this->Barang_model->ambil_makanan(),
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function minuman()
	{
		$data = [
			'halaman' => 'admin/kategori/v_minuman',
			'minuman' => $this->Barang_model->ambil_minuman(),
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function tampilinput()
	{
		$data = [
			'halaman' => 'admin/v_inputdata',
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function tampiledit($id_barang)
	{
		$data = [
			'halaman' => 'admin/v_edit',
			'barang'  => $this->Barang_model->get_barang_by_id($id_barang),
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function detail($id_barang)
	{
		$data = [
			'halaman' => 'admin/v_detail',
			'barang'  => $this->Barang_model->get_barang_by_id($id_barang),
		];
		$this->load->view('admin/v_admin', $data);
	}

	public function delete($id)
	{
		$this->Barang_model->delete_barang($id);
		redirect('admin');
	}

	public function update_barang($id)
	{
		$barang = $this->Barang_model->get_barang_by_id($id);

		$gambar = $barang->gambar_barang;

		if ($this->input->post('hapus_gambar') == 1 && !empty($gambar)) {
			$path = './uploadsgambar/' . $gambar;
			if (file_exists($path)) {
				unlink($path);
			}
			$gambar = null;
		}

		if (!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './uploadsgambar/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']      = 2048;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$gambar = $upload_data['file_name'];

				if (!empty($barang->gambar_barang)) {
					$old_path = './uploadsgambar/' . $barang->gambar_barang;
					if (file_exists($old_path)) {
						unlink($old_path);
					}
				}
			} else {
				echo $this->upload->display_errors();
				return;
			}
		}

		$data = [
			'nama_barang'   => $this->input->post('nama_barang'),
			'harga_barang'  => $this->input->post('harga_barang'),
			'deskripsi'     => $this->input->post('deskripsi'),
			'gambar_barang' => $gambar,
		];

		$this->Barang_model->update_barang($id, $data);
		redirect('admin');
	}

	public function tambah_barang()
	{
		$gambar = null;

		if (!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './uploadsgambar/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']      = 2048;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data();
				$gambar = $upload_data['file_name'];
			} else {
				echo $this->upload->display_errors();
				return;
			}
		}

		$data = [
			'nama_barang'   => $this->input->post('nama_barang'),
			'harga_barang'  => $this->input->post('harga_barang'),
			'deskripsi'     => $this->input->post('deskripsi'),
			'gambar_barang' => $gambar,
		];

		$this->Barang_model->tambah_barang($data);
		redirect('admin');
	}
}
