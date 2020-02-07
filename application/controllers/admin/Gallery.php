<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                       $this->load->model('gallery_model');
        }

    public function index()
	{
		$gallery =$this->gallery_model->listing();
		$data = array (	'title' 				=> 'gallery',
						'gallery' 				=> $gallery,
						'isi' 					=> 'admin/gallery/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function tambah()
	{
		$gallery =$this->gallery_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama gallery harus di isi'));

		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Tambah gallery',
						'gallery' => $gallery,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/gallery/tambah' );
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
				$data = array(	'nama'						=> $i->post('nama'),
								'image'						=> $upload_data['uploads']['file_name'],
								// 'content'					=> $i->post('content')
							);
			$this->gallery_model->tambah($data);
			$this->session->set_flashdata('sukses','gallery telah di tambah');
			redirect(base_url('admin/gallery'));
		}}
		// End masuk database

		$data = array ('title' => 'Tambah gallery',
						'gallery' => $gallery,
						'isi' => 'admin/gallery/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
	}


public function edit($id_gallery)
	{
		$detail = $this->gallery_model->detail($id_gallery);
		$gallery =$this->gallery_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama_gallery','nama_gallery','required',
			array (' required'		=>'nama_gallery berita harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('gambar')) {

		$data = array ('title' => 'Edit gallery',
						'detail' => $detail,
						'gallery'	=> $gallery,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/gallery/edit' );
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
		$data = array(		'id_gallery'				=>$id_gallery,
							'nama'					=> $i->post('nama'),
							'image'				=> $upload_data['uploads']['file_name'],
							'content'			=> $i->post('content'),
							);

			$this->gallery_model->edit($data);
			$this->session->set_flashdata('sukses','gallery telah di edit');
			redirect(base_url('admin/gallery'));
		}} else{
			$i = $this->input;
			$data = array(	'id_gallery'				=>$id_gallery,
							'nama'					=> $i->post('nama'),
							'content'			=> $i->post('content'),
							);


			$this->gallery_model->edit($data);
			$this->session->set_flashdata('sukses','gallery telah di edit');
			redirect(base_url('admin/gallery'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit gallery',
						'detail' => $detail,
						'gallery'	=> $gallery,
						'isi' => 'admin/gallery/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function delete($id_gallery) {
	$data = array ('id_gallery'	=> $id_gallery);
	$this->gallery_model->delete($data);
	$this->session->set_flashdata('sukses','Data gallery telah dihapus');
	redirect(base_url('admin/gallery'));
}


}