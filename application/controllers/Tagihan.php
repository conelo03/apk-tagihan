<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
        $data['title']		= 'Data Tagihan';
		$data['tagihan']	= $this->M_tagihan->get_data('BL')->result_array();
		$this->load->view('tagihan/data', $data);
	}

	public function riwayat()
	{
        $data['title']		= 'Riwayat Tagihan';
		$data['tagihan']	= $this->M_tagihan->get_data('LS')->result_array();
		$this->load->view('tagihan/riwayat', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Tagihan';
			$data['bulan']		= ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			$tahun = array();
			$thn_skrg = 2021;
			$limit  = 10;
			for($i = 0; $i < $limit; $i++){
				$thn_br = $thn_skrg + $i;
				$tahun[] = $thn_br;
			}
			$data['tahun'] = $tahun;
			$this->load->view('tagihan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$bulan 		= $data['bulan'];
			$tahun 		= $data['tahun'];
			$pelanggan  = $this->M_pelanggan->get_data()->result_array();

			foreach ($pelanggan as $p) {
				$id_paket = $p['id_paket'];
				$id_pelanggan = $p['id_pelanggan'];
				$where = [
					'bulan' => $bulan,
					'tahun' => $tahun,
					'id_pelanggan' => $id_pelanggan
				];
				$cek_pelanggan = $this->db->get_where('tb_tagihan', $where)->num_rows();
				$get_paket = $this->M_paket->get_by_id($id_paket);
				if($cek_pelanggan == 0){
					$data = [
						'bulan' => $bulan,
						'tahun' => $tahun,
						'id_pelanggan' => $id_pelanggan,
						'tagihan' => $get_paket['tarif'],
						'status' => 'BL',
					];
					$this->M_tagihan->insert($data);
				}
			}

			$this->session->set_flashdata('msg', 'success');
			redirect('tagihan');
		}
	}

	public function bayar($id_tagihan)
	{
		$date = date('Y-m-d');
		$data = [
			'id_tagihan' => $id_tagihan,
			'status' => 'LS',
			'tgl_bayar' => date('Y-m-d', strtotime($date)),
		];

		$this->M_tagihan->update($data);
		$this->session->set_flashdata('msg', 'pembayaran-success');
		redirect('tagihan');
	}

	public function notifikasi($id_tagihan)
	{
		$get_tagihan = $this->M_tagihan->get_by_id($id_tagihan);
		$get_pelanggan = $this->M_pelanggan->get_by_id($get_tagihan['id_pelanggan']);
		$nama = $get_pelanggan['nama'];
		$no_hp = $get_pelanggan['no_hp'];
		$bulan = $get_tagihan['bulan'];
		$tahun = $get_tagihan['tahun'];
		$tagihan = 'Rp '.number_format($get_tagihan['tagihan'], 2, ',', '.');
		
		redirect('https://api.whatsapp.com/send?phone='.$no_hp.'&text=Plg%20Yth,%20silahkan%20untuk%20membayar%20tagihan%20internet%20bln%20'.$bulan.'%20'.$tahun.'%20Rp. %20'.$tagihan.'.%20Terimakasih.');
	}

	public function notifikasi_sudah_bayar($id_tagihan)
	{
		$get_tagihan = $this->M_tagihan->get_by_id($id_tagihan);
		$get_pelanggan = $this->M_pelanggan->get_by_id($get_tagihan['id_pelanggan']);
		$nama = $get_pelanggan['nama'];
		$no_hp = $get_pelanggan['no_hp'];
		$bulan = $get_tagihan['bulan'];
		$tahun = $get_tagihan['tahun'];
		$tagihan = 'Rp '.number_format($get_tagihan['tagihan'], 2, ',', '.');
		
		redirect('https://api.whatsapp.com/send?phone='.$no_hp.'&text=Plg%20Yth,%20terima%20kasih%20Anda%20telah%20membayar%20tagihan%20bln%20'.$bulan.'%20'.$tahun.'%20seb%20Rp.%20'.$tagihan.'.%20Terimakasih.');
	}

	public function cetak($id_tagihan)
	{
		$data['get_tagihan'] = $this->M_tagihan->get_by_id($id_tagihan);
		$data['get_pelanggan'] = $this->M_pelanggan->get_by_id($data['get_tagihan']['id_pelanggan']);
		$data['nama'] = $data['get_pelanggan']['nama'];
		$data['alamat'] = $data['get_pelanggan']['alamat'];
		$data['no_hp'] = $data['get_pelanggan']['no_hp'];
		$data['bulan'] = $data['get_tagihan']['bulan'];
		$data['tahun'] = $data['get_tagihan']['tahun'];
		$data['tgl_bayar'] = $data['get_tagihan']['tgl_bayar'];
		$data['tagihan'] = 'Rp '.number_format($data['get_tagihan']['tagihan'], 2, ',', '.');
		$this->load->view('tagihan/cetak', $data);
	}


	private function validation()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		
	}

	public function hapus($id_paket)
	{
		$this->M_paket->delete($id_paket);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('paket');
	}
}
