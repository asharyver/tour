<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Loader {
	public $args = [];
	public function __construct() {
		parent::__construct();
		$ci =& get_instance();
		foreach ($ci->session->get_userdata() as $k => $v) {
			$this->args[$k] = $v;
		}
	}
	public function main($file, $args = []) {
		foreach ($args as $k => $v) {
			$this->args[$k] = $v;
		}
		$this->view('main/header', $this->args);
		$this->view('main/'.$file, $this->args);
		$this->view('main/footer', $this->args);
	}
	
	public function dashboard($file, $args = []) {
		foreach ($args as $k => $v) {
			$this->args[$k] = $v;
		}
		$this->view('dashboard/header', $this->args);
		$this->view('dashboard/'.$file, $this->args);
		$this->view('dashboard/footer', $this->args);
	}
	
	public function login($args = []) {
		foreach ($args as $k => $v) {
			$this->args[$k] = $v;
		}
		$this->view('dashboard/login/header', $this->args);
		$this->view('dashboard/login', $this->args);
		$this->view('dashboard/login/footer', $this->args);
	}
}
