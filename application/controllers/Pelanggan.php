<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
        $data['title']		= 'Kelola Pelanggan';
		$data['pelanggan']	= $this->M_pelanggan->get_data()->result_array();
		$this->load->view('pelanggan/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Pelanggan';
			$data['paket']		= $this->M_paket->get_data()->result_array();
			$this->load->view('pelanggan/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_tarif	= [
				'nama'		=> $data['nama'],
				'alamat'	=> $data['alamat'],
				'no_hp'		=> $data['no_hp'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				//'level'		=> $data['level'],
				'id_paket'	=> $data['id_paket'],	
			];
			if ($this->M_pelanggan->insert($data_tarif)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pelanggan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pelanggan');
			}
		}
	}

	public function edit($id_pelanggan)
	{
		$this->validation($id_pelanggan);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Pelanggan';
			$data['paket']		= $this->M_paket->get_data()->result_array();
			$data['pelanggan']	= $this->M_pelanggan->get_by_id($id_pelanggan);
			$this->load->view('pelanggan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_tarif	= [
					'id_pelanggan'	=> $id_pelanggan,
					'alamat'	=> $data['alamat'],
					'no_hp'		=> $data['no_hp'],
					'password'	=> password_hash($data['password'], PASSWORD_DEFAULT),
					//'level'		=> $data['level'],
					'id_paket'	=> $data['id_paket'],
				];
			} else {
				$data_tarif	= [
					'id_pelanggan'	=> $id_pelanggan,
					'alamat'	=> $data['alamat'],
					'no_hp'		=> $data['no_hp'],
					//'level'		=> $data['level'],
					'id_paket'	=> $data['id_paket'],
				];
			}
			
			if ($this->M_pelanggan->update($data_tarif)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pelanggan/'.$id_pelanggan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pelanggan');
			}
		}
	}

	private function validation($id_pelanggan = null)
	{
		if(is_null($id_pelanggan)){
			$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('alamat', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('no_hp', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
			
		} else {
			$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('alamat', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('no_hp', 'Nama Pelanggan', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
			
		}
		
	}

	public function hapus($id_pelanggan)
	{
		$this->M_pelanggan->delete($id_pelanggan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pelanggan');
	}
}
