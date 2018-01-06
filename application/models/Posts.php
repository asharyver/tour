<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model {
	public function count() {
		return $this->db->get('posts')->num_rows();
	}
	public function getAll($limit = 0, $offset = 0, $search = null) {
		if (!empty($search)) {
			$this->db->like('title', $search)->or_like('caption', $search);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->order_by('ID', 'DESC')->get('posts')->result();
	}
	
	public function save($data) {
		return $this->db->insert('posts', $data);
	}
	
	public function update($data, $id) {
		return $this->db->where('id', $id)->update('posts', $data);
	}
	
	public function delete($id) {
		return $this->db->where('id', $id)->delete('posts');
	}
	
	public function getPost($id) {
		return $this->db->where('id', $id)->or_where('permalink', $id)->get('posts')->row();
	}
}
