<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tagihan extends CI_Model {

	public $table	= 'tb_tagihan';

	public function get_data($status = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_tagihan.id_pelanggan');
		if(!is_null($status)){
			$this->db->where('tb_tagihan.status', $status);
		}
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_tagihan)
	{
		return $this->db->get_where($this->table, ['id_tagihan' => $id_tagihan])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_tagihan', $data['id_tagihan']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pelanggan)
	{
		$this->db->delete($this->table, ['id_tagihan' => $id_tagihan]);
	}
}
