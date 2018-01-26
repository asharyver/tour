<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {
		$this->auth->redIfNotLogin();
		$this->template->dashboard('content');
	}
	
	public function login() {
		$this->auth->redIfLogin();
		$args = [];
		if ($this->input->post('login')) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', "Username", 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run()) {
				$user = $this->input->post('username');
				$pass = $this->input->post('password');
				$this->load->model('users');
				if ( ! $usr = $this->users->getUsr($user)) {
					$args['errors'][] = 'Username not found !';
				} elseif ( ! password_verify($pass, $usr->password)) {
					$args['errors'][] = 'Password wrong !';
				} else {
					$this->auth->save($usr);
					redirect('dashboard');
				}
			} else {
				$args['errors'] = $this->form_validation->error_array();
			}
		}
		$this->template->login($args);
	}
	
	public function logout() {
		$this->auth->logout();
		redirect('dashboard/login');
	}
}
