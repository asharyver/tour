<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos_basic extends CI_Model {
	public $table = 'photo_basic';

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function count() {
		return $this->db->get($this->table)->num_rows();
	}
	
	public function getAll($limit = 0, $offset = 0) {
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->order_by('ID', 'DESC')->get($this->table)->result();
	}
	
	public function save($data) {
		return $this->db->insert($this->table, $data);
	}
	
	public function get($id) {
		return $this->db->where('id', $id)->get($this->table)->row();
	}
	
	public function delete($id) {
		return $this->db->where('id', $id)->delete($this->table);
	}
	
	public function update($data, $id) {
		return $this->db->where('ID', $id)->update($this->table, $data);
	}
}

/* End of file Photos_basic.php */
/* Location: ./application/models/Photos_basic.php */
