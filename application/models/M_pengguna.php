<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

	public $table	= 'tb_pengguna';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pengguna)
	{
		return $this->db->get_where($this->table, ['id_pengguna' => $id_pengguna])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pengguna', $data['id_pengguna']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pengguna)
	{
		$this->db->delete($this->table, ['id_pengguna' => $id_pengguna]);
	}
}
