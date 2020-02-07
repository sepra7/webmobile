<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('category_model');
               
        }

        public function index()
	{
		$category =$this->category_model->listing();
		$data = array (	'title' 				=> 'Kategori',
						'category' 				=> $category,
						'isi' 					=> 'admin/category/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}



	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama','nama','required',
			array('required'	=>'Nama Kategori harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array ('title' => 'Tambah Kategori ',
						'isi' => 'admin/category/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {
		$i =$this->input;
		// $slug = url_title($this->input->post('nama'), 'dash',TRUE);
		$data = array (	
						'nama'	=>$i->post('nama'),
						// 'slug'	=>$slug,
					);
		$this->category_model->tambah($data);
		$this->session->set_flashdata('sukses','Data kategori telah ditambah');
		redirect(base_url('admin/category'));
		}
	}

	public function edit($id_category){
		$category =$this->category_model->detail($id_category);
	

		$valid = $this->form_validation;
		$valid->set_rules('nama','nama','required',
			array('required'	=>'Nama Kategori harus diisi'));
		
		if ($valid->run()===FALSE) {


		$data = array ('title' => 'Edit Kategori',
						'category' => $category,
						'isi' => 'admin/category/edit' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {

		$i =$this->input;
		// $slug = url_title($this->input->post('nama'), 'dash',TRUE);
		$data = array (	'id_category'		=>$id_category,
						'nama'			=>$i->post('nama'),
						// 'slug'			=>$slug,
					);
		$this->category_model->edit($data);
		$this->session->set_flashdata('sukses','Data kategori telah diedit');
		redirect(base_url('admin/category'));
	}

}

	public function delete($id_category) {
		$data = array('id_category'		=>$id_category);
		$this->category_model->delete($data);
		$this->session->set_flashdata('sukses','Data kategori telah dihapus');
		redirect (base_url('admin/category'));
	}


}