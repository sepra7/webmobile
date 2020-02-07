<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                       $this->load->model('logo_model');
        }


    public function index()
	{
		$logo =$this->logo_model->listing();
		$data = array (	'title'	=> 'logo',
						'logo' 	=> $logo,
						'isi' 	=> 'admin/logo/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function tambah()
	{
		$logo =$this->logo_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama logo harus di isi'));

		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Tambah logo',
						'logo' => $logo,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/logo/tambah' );
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
								'image'						=> $upload_data['uploads']['file_name']
							);
			$this->logo_model->tambah($data);
			$this->session->set_flashdata('sukses','logo telah di tambah');
			redirect(base_url('admin/logo'));
		}}
		// End masuk database

		$data = array ('title' => 'Tambah logo',
						'logo' => $logo,
						'isi' => 'admin/logo/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
	}


public function edit($id_logo)
	{
		$detail = $this->logo_model->detail($id_logo);
		$logo =$this->logo_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama logo harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Edit logo',
						'detail' => $detail,
						'logo'	=> $logo,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/logo/edit' );
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
				if ($detail->image != "") {
				unlink('./assets/upload/image/'.$detail->image);
				unlink('./assets/upload/image/thumbs'.$detail->image);
					}
			$i = $this->input;
			$data = array(	'id_logo'			=>$id_logo,
							'nama'				=> $i->post('nama'),
							'image'				=> $upload_data['uploads']['file_name']
						
							);

			$this->logo_model->edit($data);
			$this->session->set_flashdata('sukses','logo telah di edit');
			redirect(base_url('admin/logo'));
		}} else{
			$i = $this->input;
			$data = array(	'id_logo'	=>$id_logo,
							'nama'		=> $i->post('nama'),
							);


			$this->logo_model->edit($data);
			$this->session->set_flashdata('sukses','logo telah di edit');
			redirect(base_url('admin/logo'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit logo',
						'detail' => $detail,
						'logo'	=> $logo,
						'isi' => 'admin/logo/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function delete($id_logo) {
	$data = array ('id_logo'	=> $id_logo);
	$this->logo_model->delete($data);
	$this->session->set_flashdata('sukses','Data logo telah dihapus');
	redirect(base_url('admin/logo'));
}


}