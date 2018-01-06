<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(['posts', 'videos']);
	}
	
	public function index() {
		$this->auth->redIfNotLogin();
		
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('post');
		$config['total_rows'] = $this->posts->count();
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
		
		$args['posts'] = $this->posts->getAll($limit, $offset);
		$args['title'] = 'Post';
		$args['success'] = $this->session->flashdata('success');
		$args['error'] = $this->session->flashdata('error');
		$args['pagination'] = $this->pagination->create_links();
		$this->template->dashboard('post/manage', $args);
	}
	public function delete($id) {
		$this->auth->redIfNotLogin();
		if (empty($post = $this->posts->getPost($id))) {
			$this->session->set_flashdata('errro', 'Pos tidak ditemukan');
			redirect('post');
		}
		
		$this->posts->delete($id);
		redirect('post');
		$this->session->set_flashdata('success', 'Pos telah dihapus');
	}
	
	public function edit($id) {
		$this->auth->redIfNotLogin();
		if (empty($post = $this->posts->getPost($id))) {
			$this->session->set_flashdata('errro', 'Pos tidak ditemukan');
			redirect('post');
		}
		if ($this->input->post('save')) {
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('title', "Title", 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$args[] = $this->form_validation->error_array();
			} else {
				$data['caption'] = strip_tags($this->input->post('caption'));
				$data['title'] = $this->input->post('title');
				$data['video'] = implode(',', $this->input->post('select'));
				$this->posts->update($data, $id);
				
				$this->session->set_flashdata('success', 'Pos telah diedit');
				redirect('post');
			}
		}
		$this->load->library('pagination');
		
		$args['post'] = $post;
		$args['media'] = $this->videos->getAll();
		$args['title'] = 'Edit Post';
		$this->template->dashboard('post/edit', $args);
	}
	
	public function write_new() {
		$this->auth->redIfNotLogin();
		
		if ($this->input->post('save')) {
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('title', "Title", 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$args[] = $this->form_validation->error_array();
			} else {
				$data['caption'] = strip_tags($this->input->post('caption'));
				$data['title'] = $this->input->post('title');
				$data['video'] = implode(',', $this->input->post('select'));
				$data['permalink'] = url_title($this->input->post('title'),'-',true);
				$data['time'] = time();
				$this->posts->save($data);
				
				$this->session->set_flashdata('success', 'Pos telah ditambahkan');
				redirect('post');
			}
		}
		$args['media'] = $this->videos->getAll();
		$args['title'] = 'Write Post';
		$this->template->dashboard('post/write', $args);
	}
	
	public function view($permalink = null) {
		if (empty($post = $this->posts->getPost($permalink))) {
			redirect('');
		}
		$this->load->model('users');
		$pos = [];
		foreach (explode(',', $post->video) as $v) {
			$video = $this->videos->get($v);
			$user = $this->users->getAdmin();
			$pos[] = [
				'title' => $post->title,
				'caption' => $post->caption,
				'thumbnail' => base_url($video->thumbnail),
				'video' => base_url($video->source),
				'type' => $video->type,
				'pict' => base_url('app-contents/dashboard/photo/'.$user->pict),
				'fullname' => $user->fullname
			];
		}
		$args['posts'] = $pos;
		$args['title'] = $post->title;
		$this->template->main('single', $args);
	}
}
