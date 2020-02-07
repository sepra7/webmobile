<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('pemesanan_model');
                $this->load->model('category_model');
        }

    public function index()
	{
		$pemesanan =$this->pemesanan_model->listinguser();
		$data = array (	'title' 				=> 'Pemesanan',
						'pemesanan' 					=> $pemesanan,
						'isi' 					=> 'users/list' );
		$this->load->view('users/layout/wrapper',$data);
	}



	public function edit($id_pemesanan)
	{
		$kategori = $this->category_model->listing();
		$detail = $this->pemesanan_model->detail($id_pemesanan);
		$pemesanan =$this->pemesanan_model->listing();

		$v = $this->form_validation;
		$v->set_rules ('nama','nama','required',
			array (' required'		=>'nama berita harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['struk']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('struk')) {

		$data = array ('title' => 'Edit pemesanan',
						'detail' => $detail,
						'kategori' => $kategori,
						'pemesanan'	=> $pemesanan,
						'error'		=> $this->upload->display_errors(),
						'isi' => 'users/edit' );
		$this->load->view('users/layout/wrapper',$data);
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
				if ($detail->struk != "") {
				unlink('./assets/upload/image/'.$detail->struk);
				unlink('./assets/upload/image/thumbs'.$detail->struk);
					}
			$i = $this->input;
		$data = array(		'id_pemesanan'				=>$id_pemesanan,
							'nama'	=>$i->post('nama'),
							// 'alamat'	=>$i->post('alamat'),
							// 'id_category'	=>$i->post('id_category'),
							// 'no_hp'	=>$i->post('no_hp'),
							// // 'nama_pesanan'	=>$i->post('nama_pesanan'),
							// 'harga'	=>$i->post('harga'),
							// 'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'struk'			=> $upload_data['uploads']['file_name'],
							'status' => 'diperiksa'
							// 'keterangan'	=>$i->post('keterangan'),

							);

			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di perbarui');
			redirect(base_url('users/pemesanan'));
		}} else{
			$i = $this->input;
			$data = array(	'id_pemesanan' =>$id_pemesanan,
							'nama'	=>$i->post('nama'),
							'nama'	=> 'diperiksa',


							);


			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di perbarui');
			redirect(base_url('users/pemesanan'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit pemesanan',
						'detail' => $detail,
						'kategori' => $kategori,
						'pemesanan'	=> $pemesanan,
						'isi' => 'users/edit' );
		$this->load->view('users/layout/wrapper',$data);
	}
	
	
	public function Show($id_pemesanan)
	{
		$detail = $this->pemesanan_model->detail($id_pemesanan);
		// $pemesanan =$this->pemesanan_model->listing();
		$data = array (	'title' 				=> 'pemesanan',
						'pemesanan' 				=> $detail,
						'isi' 					=> 'users/show' );
		$this->load->view('users/layout/wrapper',$data);
		
	}	


	public function delete($id_user) {
		$data = array('id_user'		=>$id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data user telah dihapus');
		redirect (base_url('admin/user'));
	}


}