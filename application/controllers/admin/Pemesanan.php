<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('pemesanan_model');
                $this->load->model('category_model');
                $this->load->model('user_model');
               
        }

        public function index()
	{
		$pemesanan =$this->pemesanan_model->listing();
		$data = array (	'title' 				=> 'pemesanan',
						'pemesanan' 				=> $pemesanan,
						'isi' 					=> 'admin/pemesanan/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}



	public function tambah()
	{

		$kategori =$this->category_model->listing();
		$user =$this->user_model->listingusers();
		$valid = $this->form_validation;
		$valid->set_rules('nama','nama','required',
			array('required'	=>'Nama  harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array ('title' => 'Tambah pemesanan ',
						'kategori' => $kategori,
						'user' => $user,
						'isi' => 'admin/pemesanan/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {
		$i =$this->input;
		$data = array (	
							'nama'	=>$i->post('nama'),
							'alamat'	=>$i->post('alamat'),
							'id_category'	=>$i->post('id_category'),
							'no_hp'	=>$i->post('no_hp'),
							'id_user'	=>$i->post('id_user'),
							// 'nama_pesanan'	=>$i->post('nama_pesanan'),
							'harga'	=>$i->post('harga'),
							'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'struk'	=>0,
							'keterangan'	=>$i->post('keterangan'),
							'status'		=>"belum dibayar"
					);
		$this->pemesanan_model->tambah($data);
		$this->session->set_flashdata('sukses','Data pemesanan telah ditambah');
		redirect(base_url('admin/pemesanan'));
		}
	}



public function edit($id_pemesanan)
	{
		$user =$this->user_model->listing();
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
						'isi' => 'admin/pemesanan/edit' );
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
				if ($detail->struk != "") {
				unlink('./assets/upload/image/'.$detail->struk);
				unlink('./assets/upload/image/thumbs'.$detail->struk);
					}
			$i = $this->input;
		$data = array(		'id_pemesanan'				=>$id_pemesanan,
							'nama'	=>$i->post('nama'),
							'alamat'	=>$i->post('alamat'),
							'id_category'	=>$i->post('id_category'),
							'no_hp'	=>$i->post('no_hp'),
							// 'nama_pesanan'	=>$i->post('nama_pesanan'),
							'harga'	=>$i->post('harga'),
							'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'struk'			=> $upload_data['uploads']['file_name'],
							'keterangan'	=>$i->post('keterangan'),
							'status' 		=> 'diterima'

							);

			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di edit');
			redirect(base_url('admin/pemesanan'));
		}} else{
			$i = $this->input;
			$data = array(	'id_pemesanan' =>$id_pemesanan,
							'nama'	=>$i->post('nama'),
							'alamat'	=>$i->post('alamat'),
							'id_category'	=>$i->post('id_category'),
							'no_hp'	=>$i->post('no_hp'),
							// 'nama_pesanan'	=>$i->post('nama_pesanan'),
							'harga'	=>$i->post('harga'),
							'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'keterangan'	=>$i->post('keterangan'),
							'status'		=> 'diterima'

							);


			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di edit');
			redirect(base_url('admin/pemesanan'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit pemesanan',
						'detail' => $detail,
						'kategori' => $kategori,
						'pemesanan'	=> $pemesanan,
						'isi' => 'admin/pemesanan/edit' );
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function detail($id_pemesanan)
	{
		$user =$this->user_model->listing();
		$detail = $this->pemesanan_model->detail($id_pemesanan);
		$pemesanan =$this->pemesanan_model->listing();
		$v = $this->form_validation;
		$v->set_rules ('nama_pesanan','nama_pesanan','required',
			array (' required'		=>'foto harus di isi'));

		if($v->run()) {
			if(!empty($_FILES['struk']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload('struk')) {

		$data = array ('title' => 'Edit pemesanan',
						'detail' => $detail,
						'user' => $user,
						'pemesanan'	=> $pemesanan,
						'error'		=> $this->upload->display_errors(),
						 );
		$this->load->view('admin/pemesanan/detail',$data);
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
							'alamat'	=>$i->post('alamat'),
							'id_category'	=>$i->post('id_category'),
							'no_hp'	=>$i->post('no_hp'),
							'nama_pesanan'	=>$i->post('nama_pesanan'),
							'harga'	=>$i->post('harga'),
							'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'struk'			=> $upload_data['uploads']['file_name'],
							'keterangan'	=>$i->post('keterangan'),
							);

			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di edit');
			redirect(base_url('admin/pemesanan'));
		}} else{
			$i = $this->input;
			$data = array(	'id_pemesanan'				=>$id_pemesanan,
							'nama'	=>$i->post('nama'),
							'alamat'	=>$i->post('alamat'),
							'id_category'	=>$i->post('id_category'),
							'no_hp'	=>$i->post('no_hp'),
							// 'nama_pesanan'	=>$i->post('nama_pesanan'),
							'harga'	=>$i->post('harga'),
							'tanggal_mulai'	=>$i->post('tanggal_mulai'),
							'keterangan'	=>$i->post('keterangan'),

							);


			$this->pemesanan_model->edit($data);
			$this->session->set_flashdata('sukses','pemesanan telah di edit');
			redirect(base_url('admin/pemesanan'));
		}}
		// End masuk database

		$data = array ('title' => 'Edit pemesanan',
						'detail' => $detail,
						'pemesanan'	=> $pemesanan,
						 );
		$this->load->view('admin/pemesanan/detail',$data);
	}


	public function show($id_pemesanan)
	{
		$detail = $this->pemesanan_model->detail($id_pemesanan);
		// $pemesanan =$this->pemesanan_model->listing();
		$data = array (	'title' 				=> 'pemesanan',
						'pemesanan' 				=> $detail,
						'isi' 					=> 'admin/pemesanan/show' );
		$this->load->view('admin/layout/wrapper',$data);
		
	}	


	 public function getauto() {

        $kode=$this->input->get('id_category');
        $data=$this->pemesanan_model->getdata($kode);
        foreach ($data as $row ) 
            $hasil['harga'] = $row->harga;
        echo json_encode($hasil);
    }



	public function delete($id_pemesanan) {
		$data = array('id_pemesanan'		=>$id_pemesanan);
		$this->pemesanan_model->delete($data);
		$this->session->set_flashdata('sukses','Data pemesanan telah dihapus');
		redirect (base_url('admin/pemesanan'));
	}


}