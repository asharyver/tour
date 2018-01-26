<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {
	public function getUsr($usr) {
		return $this->db->where('username', $usr)->get('users')->row();
	}
	
	public function getAdmin() {
		return $this->db->get('users')->row();
	}
	
	public function update($data, $ID) {
		return $this->db->where('ID', $ID)->update('users', $data);
	}
}
