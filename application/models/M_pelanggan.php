<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public $table	= 'tb_pelanggan';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_paket', 'tb_paket.id_paket=tb_pelanggan.id_paket', 'left');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pelanggan)
	{
		return $this->db->get_where($this->table, ['id_pelanggan' => $id_pelanggan])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pelanggan)
	{
		$this->db->delete($this->table, ['id_pelanggan' => $id_pelanggan]);
	}
}
