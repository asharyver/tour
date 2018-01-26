<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('photos');
		$this->auth->redIfNotLogin();
	}

	public function index()
	{
		$this->auth->redIfNotLogin();
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('media/foto');
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
		
		$args['title'] = 'Media';
		$args['media'] = $this->photos->getAll($limit, $offset);
		$args['error'] = $this->session->flashdata('error');
		$args['success'] = $this->session->flashdata('success');
		$args['pagination'] = $this->pagination->create_links();
		$this->template->dashboard('photo/manage', $args);
	}
	
	public function upload() {
		if ($this->input->post('upload') !== 'upload') {
			redirect('photo');
		}
		
		$this->load->helper('security');
		$config['upload_path'] 		= FCPATH .'app-contents/photo/';
		$config['file_ext_tolower'] = true;
		$config['allowed_types']    = '*';
		$config['overwrite'] 		= true;
		$this->load->library('upload', $config);
		
		$this->upload->do_upload('photo');
		$files = $this->upload->data();
		$data = [
			'name' => $this->input->post('name'),
			'path' => 'app-contents/photo/'.$files['file_name'],
			'shown' => (bool) $this->input->post('shown_in_gallery'),
			'time' => time()
		];
		$this->photos->save($data);
		
		redirect('photo');
	}
	
	public function delete($id) {
		if (empty($media = $this->photos->get($id))) {
			if ($this->input->is_ajax_request()) {
				echo json_encode(['err' => 'File Tidak Ditemukan']);
				$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
				exit;
			}
			$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
			redirect('photo');
		}
		
		@unlink($media->path);
		
		$this->photos->delete($id);
		if ($this->input->is_ajax_request()) {
			echo json_encode(['err' => 'ok']);
			$this->session->set_flashdata('success', 'Foto telah dihapus');
			exit;
		}
		$this->session->set_flashdata('success', 'Foto telah dihapus');
		redirect('media/photo');
	}
	
	public function edit($id) {
		var_dump($id);
		if (empty($media = $this->photos->get($id))) {
			if ($this->input->is_ajax_request()) {
				echo json_encode(['err' => 'File Tidak Ditemukan']);
				$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
				exit;
			}
			$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
			redirect('photo');
		}
		
		$data = [
			'name' => $this->input->post('name'),
			'shown' => (bool) $this->input->post('shown')
		];
		
		$this->photos->update($data, $id);
		if ($this->input->is_ajax_request()) {
			echo json_encode(['err' => 'ok']);
			$this->session->set_flashdata('success', 'Foto telah diedit');
			exit;
		}
		$this->session->set_flashdata('success', 'Foto telah diedit');
		redirect('media/photo');
	}
	
	public function gallery()
	{
		
	}

}

/* End of file Photo.php */
/* Location: ./application/controllers/Photo.php */
