<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                       $this->load->model('partner_model');
        }


    public function index()
	{
		$partner =$this->partner_model->listing();
		$data = array (	'title' 				=> 'partner',
						'partner' 				=> $partner,
						'isi' 					=> 'admin/partner/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function tambah()
	{
		$partner =$this->partner_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama partner harus di isi'));

		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('image')) {

		$data = array ('title' => 'Tambah partner',
						'partner' => $partner,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/partner/tambah' );
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
							);
			$this->partner_model->tambah($data);
			$this->session->set_flashdata('sukses','partner telah di tambah');
			redirect(base_url('admin/partner'));
		}}
		// End masuk database

		$data = array ('title' => 'Tambah partner',
						'partner' => $partner,
						'isi' => 'admin/partner/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
	}


public function edit($id_partner)
	{
		$detail = $this->partner_model->detail($id_partner);
		$partner =$this->partner_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama berita harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('gambar')) {

		$data = array ('title' => 'Edit partner',
						'detail' => $detail,
						'partner'	=> $partner,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'admin/partner/edit' );
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
		$data = array(		'id_partner'				=>$id_partner,
							'nama'					=> $i->post('nama'),
							'image'				=> $upload_data['uploads']['file_name'],
							);

			$this->partner_model->edit($data);
			$this->session->set_flashdata('sukses','partner telah di edit');
			redirect(base_url('admin/partner'));
		}} else{
			$i = $this->input;
			$data = array(	'id_partner'				=>$id_partner,
							'nama'					=> $i->post('nama'),
							);


			$this->partner_model->edit($data);
			$this->session->set_flashdata('sukses','partner telah di edit');
			redirect(base_url('admin/partner'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit partner',
						'detail' => $detail,
						'partner'	=> $partner,
						'isi' => 'admin/partner/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}


	public function delete($id_partner) {
	$data = array ('id_partner'	=> $id_partner);
	$this->partner_model->delete($data);
	$this->session->set_flashdata('sukses','Data partner telah dihapus');
	redirect(base_url('admin/partner'));
}


}