<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('produk_model');
                $this->load->model('category_model');
               
        }

        public function index()
	{
		$produk =$this->produk_model->listing();
		$data = array (	'title' 				=> 'produk',
						'produk' 				=> $produk,
						'isi' 					=> 'admin/produk/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}



	public function tambah()
	{
		$kategori =$this->category_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('nama_paket','nama_paket','required',
			array('required'	=>'Nama paket harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array ('title' => 'Tambah produk ',
						'kategori' => $kategori,
						'isi' => 'admin/produk/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {
		$i =$this->input;
		// $slug = url_title($this->input->post('nama'), 'dash',TRUE);
		$data = array (	
						'nama_paket'	=>$i->post('nama_paket'),
						'attr1'	=>$i->post('attr1'),
						'attr2'	=>$i->post('attr2'),
						'attr3'	=>$i->post('attr3'),
						'harga'	=>$i->post('harga'),
						'id_category'	=>$i->post('id_category'),
						// 'slug'	=>$slug,
					);
		$this->produk_model->tambah($data);
		$this->session->set_flashdata('sukses','Data produk telah ditambah');
		redirect(base_url('admin/produk'));
		}
	}

	public function edit($id_produk){
		$produk =$this->produk_model->detail($id_produk);
	

		$valid = $this->form_validation;
		$valid->set_rules('nama_paket','nama_paket','required',
			array('required'	=>'Nama paket harus diisi'));
		
		if ($valid->run()===FALSE) {


		$data = array ('title' => 'Edit produk',
						'produk' => $produk,
						'isi' => 'admin/produk/edit' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {

		$i =$this->input;
		// $slug = url_title($this->input->post('nama'), 'dash',TRUE);
		$data = array (	'id_produk'		=>$id_produk,
						'nama'	=>$i->post('nama_paket'),
						'attr1'	=>$i->post('attr1'),
						'attr2'	=>$i->post('attr2'),
						'attr3'	=>$i->post('attr3'),
						'harga'	=>$i->post('harga'),
						'id_category'	=>$i->post('id_category'),
						// 'slug'			=>$slug,
					);
		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses','Data produk telah diedit');
		redirect(base_url('admin/produk'));
	}

}

	public function delete($id_produk) {
		$data = array('id_produk'		=>$id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses','Data produk telah dihapus');
		redirect (base_url('admin/produk'));
	}


}