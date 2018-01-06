<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(['videos', 'posts', 'users']);
	}
	
	public function index() {
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('post');
		$config['total_rows'] = ($search = $this->input->get('search')) ? $this->db->like('title', $search)->or_like('caption', $search)->get('posts')->num_rows() : $this->db->get('posts')->num_rows();
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
		
		$pos = [];
		// $i = 0;
		foreach ($this->posts->getAll($limit, $offset, $search) as $row) {
			$mediaId = explode(',', $row->video);
			$user = $this->users->getAdmin();
			$pos[] = [
				'thumbnail' => $this->videos->get($mediaId[0])->thumbnail,
				'title'     => $row->title,
				'caption'   => $row->caption,
				'permalink' => 'post/view/'.$row->permalink,
				'author'    => [
					'name'  => $user->fullname,
					'pict'  => 'app-contents/dashboard/photo/'.$user->pict
				]
			];
			// $pos[$i] = new StdClass();
			// $pos[$i]->thumbnail = $this->medias->getVid($mediaId[0])->thumbnail;
			// $pos[$i]->title = $row->title;
			// $pos[$i]->caption = $row->caption;
			// $pos[$i]->permalink = 'post/view/'.$row->permalink;
			// $i++;
		}
		$args['pagination'] = $this->pagination->create_links();
		$args['isLogin'] = $this->auth->isLogin();
		$args['title'] = 'Home';
		$args['posts'] = $pos;
		$this->template->main('content', $args);
	}
	
	public function about_us() {
		$args['title'] = 'About Us';
		$args['posts'] = 'ds';
		$this->template->main('about-us', $args);
	}
}
