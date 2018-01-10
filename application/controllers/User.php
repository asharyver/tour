<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('users');
	}
	public function index() {
		$this->auth->redIfNotLogin();
		$args['user'] = $this->users->getAdmin();
		$args['title'] = 'Account';
		$this->template->dashboard('user/view', $args);
	}
	
	public function edit() {
		$this->auth->redIfNotLogin();
		$error = [];
		$user = $this->users->getAdmin();
		$this->auth->redIfNotLogin();
		if ($this->input->post('save')) {
			
			if ( ! empty($this->input->post('password')) && $this->input->post('password') != $this->input->post('password')) {
				$error[] = 'Kata sandi tidak sama';
			} else {
				$data = [
					'fullname' => $this->input->post('fullname'),
					'username' => strtolower($this->input->post('username'))
				];
				if ( ! empty($this->input->post('password'))) {
					$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				if (!empty($_FILES)) {
					$config['upload_path'] 		= FCPATH .'app-contents/dashboard/photo/';
					$config['file_ext_tolower'] = true;
					$config['allowed_types']    = '*';
					$config['overwrite'] 		= true;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('photo')) {
						$error = array_merge($this->upload->error_msg, $error);
					} else {
						$files = $this->upload->data();
						$data['pict'] = $files['file_name'];
						if ($user->pict !== $files['file_name']) {
							unlink(FCPATH .'app-contents/dashboard/photo/'.$user->pict);
						}
					}
				}
				$this->users->update($data, $this->session->userdata('ID'));
				$this->session->sess_destroy();
				if ( ! $this->input->is_ajax_request()) {
					redirect('dashboard/login');
				}
			}
			
		}
		
		if ($this->input->is_ajax_request()) {
			echo json_encode([
				'message' => isset($error) ? $error : ''
			]);
			exit;
		}
		
		$args['user'] = $user;
		$args['title'] = 'Edit Profile';
		$args['error'] = isset($error) ? $error : [];
		$this->template->dashboard('user/edit', $args);
	}
}
