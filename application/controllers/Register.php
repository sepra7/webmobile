<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                $this->load->model('user_model');
        }


	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('username','username','required',
			array('required'	=>'username harus diisi'));

		if ($valid->run()===FALSE) {

		$data = array ('title' => 'Daftar ');
		$this->load->view('users/register',$data);
		} else {

		$i =$this->input;
		$data = array (	
						'nama'				=>$i->post('nama'),
						'email'				=>$i->post('email'),
						'username'			=>$i->post('username'),
						'password'			=>$i->post('password'),
						'level'				=>"pelanggan",
					);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses','regitrasi berhasil ');
		redirect(base_url('login'));
	}
	}


}