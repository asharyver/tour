<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Model {

	public $table = 'videos';

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
		return $this->db->order_by('ID', 'ASC')->get($this->table)->result();
	}
	
	public function save($data) {
		return $this->db->insert($this->table, $data);
	}
	
	public function get($id) {
		return $this->db->where('id', $id)->get($this->table)->row();
	}
	
	public function update($data, $id) {
		return $this->db->where('ID', $id)->update($this->table, $data);
	}
	
	public function lastUploaded() {
		return $this->db->where('thumbnail', '')->order_by('ID', 'DESC')->get($this->table)->row();
	}
	
	public function delete($id) {
		return $this->db->where('ID', $id)->delete($this->table);
	}

}

/* End of file Videos.php */
/* Location: ./application/models/Videos.php */
