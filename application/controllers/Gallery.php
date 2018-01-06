<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(['videos', 'photos']);
	}
	
	public function index() {
		redirect('');
	}
	
	public function foto() {
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('gallery/foto');
		$config['total_rows'] = $this->photos->count();
		$config['per_page'] = $limit;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li'>
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li'>
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$args['posts'] = $this->photos->getAll($limit, $offset);
		$args['title'] = 'Gallery Foto';
		$args['pagination'] = $this->pagination->create_links();
		$this->template->main('gallery/foto', $args);
	}
	
	public function video() {
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('gallery/video');
		$config['total_rows'] = $this->videos->count();
		$config['per_page'] = $limit;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li'>
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li'>
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$args['posts'] = $this->videos->getAll($limit, $offset);
		$args['pagination'] = $this->pagination->create_links();
		$args['title'] = 'Gallery Video';
		$this->template->main('gallery/video', $args);
	}
}
