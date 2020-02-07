<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                       $this->load->model('slider_model');
        }


    public function index()
	{
		$slider =$this->slider_model->listing();
		$data = array (	'title' 				=> 'Slider',
						'slider' 				=> $slider,
						'isi' 					=> 'admin/slider/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function tambah()
	{
		$slider =$this->slider_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama slider harus di isi'));

		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Tambah Slider',
						'slider' => $slider,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/slider/tambah' );
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
			$this->slider_model->tambah($data);
			$this->session->set_flashdata('sukses','slider telah di tambah');
			redirect(base_url('admin/slider'));
		}}
		// End masuk database

		$data = array ('title' => 'Tambah Slider',
						'slider' => $slider,
						'isi' => 'admin/slider/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
	}


public function edit($id_slider)
	{
		$detail = $this->slider_model->detail($id_slider);
		$slider =$this->slider_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama_slider','nama_slider','required',
			array (' required'		=>'nama_slider berita harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('gambar')) {

		$data = array ('title' => 'Edit slider',
						'detail' => $detail,
						'slider'	=> $slider,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/slider/edit' );
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
		$data = array(		'id_slider'				=>$id_slider,
							'nama'					=> $i->post('nama'),
							'image'				=> $upload_data['uploads']['file_name'],
							'content'			=> $i->post('content'),
							);

			$this->slider_model->edit($data);
			$this->session->set_flashdata('sukses','slider telah di edit');
			redirect(base_url('admin/slider'));
		}} else{
			$i = $this->input;
			$data = array(	'id_slider'				=>$id_slider,
							'nama'					=> $i->post('nama'),
							'content'			=> $i->post('content'),
							);


			$this->slider_model->edit($data);
			$this->session->set_flashdata('sukses','slider telah di edit');
			redirect(base_url('admin/slider'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit slider',
						'detail' => $detail,
						'slider'	=> $slider,
						'isi' => 'admin/slider/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function delete($id_slider) {
	$data = array ('id_slider'	=> $id_slider);
	$this->slider_model->delete($data);
	$this->session->set_flashdata('sukses','Data slider telah dihapus');
	redirect(base_url('admin/slider'));
}


}