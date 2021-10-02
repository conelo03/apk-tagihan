<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

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
        $data['title']		= 'Kelola Paket';
		$data['paket']		= $this->M_paket->get_data()->result_array();
		$this->load->view('paket/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Paket';
			$this->load->view('paket/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_tarif	= [
				'paket'		=> $data['paket'],
				'tarif'		=> $data['tarif'],
			];
			if ($this->M_paket->insert($data_tarif)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-paket');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('paket');
			}
		}
	}

	public function edit($id_paket)
	{
		$this->validation($id_paket);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Paket';
			$data['paket']	= $this->M_paket->get_by_id($id_paket);
			$this->load->view('paket/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_tarif	= [
				'id_paket'	=> $id_paket,
				'paket'		=> $data['paket'],
				'tarif'		=> $data['tarif'],
			];
			
			if ($this->M_paket->update($data_tarif)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-paket/'.$id_paket);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('paket');
			}
		}
	}

	private function validation($id_paket = null)
	{
		$this->form_validation->set_rules('paket', 'Paket', 'required|trim');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|trim');
		
	}

	public function hapus($id_paket)
	{
		$this->M_paket->delete($id_paket);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('paket');
	}
}
