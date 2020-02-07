<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index() {
		$valid = $this->form_validation;
		$valid->set_rules('username', 'username', 'required',
						array('required'	=>'Username harus di isi'));
		$valid->set_rules('password', 'password', 'required',
						array('required'	=>'Password harus di isi'));
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');

		if($valid->run()) {
			$this->simple_login->login($username,$password,
				base_url('users/user'), base_url('login'));
		}
		$data = array('title'	=> 'Halaman Login ');
		$this->load->view('users/login_view',$data);

	}

	public function logout() {
		$this->simple_login->logout();
	}

	}