<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('videos');
		$this->auth->redIfNotLogin();
	}

	public function index()
	{
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('gallery/foto');
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
		
		$args['title'] = 'Media';
		$args['media'] = $this->videos->getAll($limit, $offset);
		$args['error'] = $this->session->flashdata('error');
		$args['success'] = $this->session->flashdata('success');
		$args['pagination'] = $this->pagination->create_links();
		$this->template->dashboard('video/manage', $args);
	}
	
	public function upload() {
		if ($this->input->post('upload') !== 'upload') {
			redirect('video');
		}
		
		$config['upload_path'] 		= FCPATH .'app-contents/video/';
		$config['file_ext_tolower'] = true;
		$config['allowed_types']    = '*';
		$config['overwrite'] 		= true;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('video')) {
			$this->session->set_flashdata('error', $this->session->flashdata('error') . $this->upload->display_errors());
		} else {
			$files = $this->upload->data();
			
			$config['upload_path'] = FCPATH .'app-contents/poster/';
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('thumbnail')) {
				$this->session->set_flashdata('error', $this->session->flashdata('error') . $this->upload->display_errors());
			} else {
				$thumbnail = $this->upload->data();
				$data = [
					'name' => empty($name = $this->input->post('name')) ? $files['raw_name'] : $name,
					'source' => 'app-contents/video/' . $files['file_name'],
					'thumbnail' => 'app-contents/poster/' . $thumbnail['file_name'],
					'type' => $files['file_type']
				];
				$this->videos->save($data);
			}
		}
		
		redirect('video');
	}
	
	public function delete($id) {
		if (empty($media = $this->videos->get($id))) {
			$this->session->set_flashdata('error', 'Video tidak ditemukan !');
			if ( ! $this->input->is_ajax_request()) {
				redirect('media/video');
			}
		}
		
		if (file_exists($path = FCPATH . $media->source)) {
			@unlink($path);
		}
		
		if (file_exists($path = FCPATH . $media->thumbnail)) {
			@unlink($path);
		}
		
		$this->videos->delete($id);
		$this->session->set_flashdata('success', 'Video telah dihapus');
		if (!$this->input->is_ajax_request()) {
			redirect('media/video');
		}
	}
}

/* End of file  */
/* Location: ./application/controllers/ */
