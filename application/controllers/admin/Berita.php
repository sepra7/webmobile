<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                       $this->load->model('berita_model');
        }


    public function index()
	{
		$berita =$this->berita_model->listing();
		$data = array (	'title' 				=> 'berita',
						'berita' 				=> $berita,
						'isi' 					=> 'admin/berita/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function tambah()
	{
		$berita =$this->berita_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('title','title','required',
			array (' required'		=>'Judul berita harus di isi'));

		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Tambah berita',
						'berita' => $berita,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/berita/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 879; // Pixel
				$config['height'] 			= 198; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$slug = url_title($this->input->post('title'), 'dash',TRUE);
				$data = array(	'judul'						=> $i->post('title'),
								'slug'						=> $slug,
								'isi'					=> $i->post('content'),
								'image'						=> $upload_data['uploads']['file_name'],
								'datetime'						=> date('Y/m/d')
							);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses','berita telah di tambah');
			redirect(base_url('admin/berita'));
		}}
		// End masuk database

		$data = array ('title' => 'Tambah berita',
						'berita' => $berita,
						'isi' => 'admin/berita/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
	}


public function edit($id_news)
	{
		$detail = $this->berita_model->detail($id_news);
		$berita =$this->berita_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('title','title','required',
			array (' required'		=>'judul berita harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('gambar')) {

		$data = array ('title' 		=> 'Edit berita',
						'detail' 	=> $detail,
						'berita'	=> $berita,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/berita/edit' );
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				if ($detail->gambar != "") {
				unlink('./assets/upload/image/'.$detail->gambar);
				unlink('./assets/upload/image/thumbs'.$detail->gambar);
					}
			$i = $this->input;
			$slug = url_title($this->input->post('title'), 'dash',TRUE);
			$data = array(		'id_news'				=>$id_news,
								'title'						=> $i->post('title'),
								'slug'						=> $slug,
								'content'					=> $i->post('content'),
								'image'						=> $upload_data['uploads']['file_name'],
								'date'						=> $i->post('date')
							);

			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','berita telah di edit');
			redirect(base_url('admin/berita'));
		}} else{
			$i = $this->input;
			$data = array(	'id_news'					=> $id_news,
							'title'						=> $i->post('title'),
							'slug'						=> $slug,
							'content'					=> $i->post('content'),
							'date'						=> $i->post('date')
							);


			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','berita telah di edit');
			redirect(base_url('admin/berita'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit berita',
						'detail' => $detail,
						'berita'	=> $berita,
						'isi' => 'admin/berita/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function delete($id_news) {
	$data = array ('id_news'	=> $id_news);
	$this->berita_model->delete($data);
	$this->session->set_flashdata('sukses','Data berita telah dihapus');
	redirect(base_url('admin/berita'));
}


}