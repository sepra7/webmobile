<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('testimonial_model');
        }

    public function index()
	{
		$testimonial =$this->testimonial_model->listinguser();
		$data = array (	'title' 				=> 'testimonial',
						'testimonial' 					=> $testimonial,
						'isi' 					=> 'users/testi' );
		$this->load->view('users/layout/wrapper',$data);
	}

	public function tambah()
	{

		// $testimonial =$this->testimonial_model->listinguser();
		$valid = $this->form_validation;
		$valid->set_rules('komentar','komentar','required',
			array('required'	=>'komentar  harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array ('title' => 'Tambah Testimonial ',
						'isi' => 'users/tambah' );
		$this->load->view('users/layout/wrapper',$data);
		} else {
		$i =$this->input;
		$data = array (	
							'komentar'	=>$i->post('komentar'),
							'datetime'	=>date('Y-m-d'),
							'id_user'	=>$this->session->userdata('id'),
						
					);
		$this->testimonial_model->tambah($data);
		$this->session->set_flashdata('sukses','Data Testimonial telah ditambah');
		redirect(base_url('users/testimonial'));
		}
	}



	

}