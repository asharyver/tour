<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo_basic extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('photos_basic');
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
		
		$config['base_url'] = base_url('photo-basic');
		$config['total_rows'] = $this->photos_basic->count();
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
		$args['media'] = $this->photos_basic->getAll($limit, $offset);
		$args['error'] = $this->session->flashdata('error');
		$args['success'] = $this->session->flashdata('success');
		$args['pagination'] = $this->pagination->create_links();
		$this->template->dashboard('photo_basic/manage', $args);
	}
	
	public function upload() {
		if ($this->input->post('upload') !== 'upload') {
			redirect('photo-basic');
		}
		
		$this->load->helper('security');
		$config['upload_path'] 		= FCPATH .'app-contents/photo-basic/';
		$config['file_ext_tolower'] = true;
		$config['allowed_types']    = '*';
		$config['overwrite'] 		= true;
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('photo')) {
			$files = $this->upload->data();
			$data = [
				'title' => $this->input->post('title'),
				'image' => 'app-contents/photo-basic/'.$files['file_name'],
				'caption' => $this->input->post('caption'),
				'shown' => (bool) $this->input->post('shown_in_gallery'),
				'time' => time()
			];
			$this->photos_basic->save($data);
			
			$this->session->set_flashdata('success', 'Foto berhasil diupload!');
		} else {
			$this->session->set_flashdata('error', 'Foto tidak berhasil diupload !');
		}
		
		redirect('photo-basic');
	}
	
	public function delete($id) {
		if (empty($media = $this->photos_basic->get($id))) {
			if ($this->input->is_ajax_request()) {
				echo json_encode(['err' => 'File Tidak Ditemukan']);
				$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
				exit;
			}
			$this->session->set_flashdata('error', 'Foto tidak ditemukan !');
			redirect('photo-basic');
		}
		
		@unlink($media->path);
		
		$this->photos_basic->delete($id);
		if ($this->input->is_ajax_request()) {
			echo json_encode(['err' => 'ok']);
			$this->session->set_flashdata('success', 'Foto telah dihapus');
			exit;
		}
		$this->session->set_flashdata('success', 'Foto telah dihapus');
		redirect('photo-basic');
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
			redirect('photo-basic');
		}
		
		$data = [
			'title' => $this->input->post('title'),
			'caption' => $this->input-post('caption'),
			'shown' => (bool) $this->input->post('shown')
		];
		
		$this->photos->update($data, $id);
		if ($this->input->is_ajax_request()) {
			echo json_encode(['err' => 'ok']);
			$this->session->set_flashdata('success', 'Foto telah diedit');
			exit;
		}
		$this->session->set_flashdata('success', 'Foto telah diedit');
		redirect('photo-basic');
	}
}

/* End of file Photo_basic.php */
/* Location: ./application/controllers/Photo_basic.php */
