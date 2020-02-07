<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('user_model');
        }

        public function index()
	{
		$user =$this->user_model->listing();
		$data = array (	'title' 				=> 'User',
						'user' 					=> $user,
						'isi' 					=> 'admin/user/list' );
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama','nama','required',
			array('required'	=>'Nama user harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array ('title' => 'Tambah user ',
						'isi' => 'admin/user/tambah' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {
		$i =$this->input;
		$data = array (	
						'nama'	=>$i->post('nama'),
						'username'	=>$i->post('username'),
						'password'	=>$i->post('password'),
						'email'	=>$i->post('email'),
						'alamat'	=>$i->post('alamat'),
						'jk'	=>$i->post('jk'),
						'level'	=>$i->post('level'),
					);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses','Data user telah ditambah');
		redirect(base_url('admin/user'));
		}
	}

	public function edit($id_user){
		$user =$this->user_model->detail($id_user);
	

		$valid = $this->form_validation;
		$valid->set_rules('nama','nama','required',
			array('required'	=>'Nama user harus diisi'));
		
		if ($valid->run()===FALSE) {


		$data = array ('title' => 'Edit user',
						'user' => $user,
						'isi' => 'admin/user/edit' );
		$this->load->view('admin/layout/wrapper',$data);
		} else {

		$i =$this->input;
		$data = array (	'id_user'		=>$id_user,
						'nama'			=>$i->post('nama'),
						'username'	=>$i->post('username'),
						'password'	=>$i->post('password'),
						'email'	=>$i->post('email'),
						'alamat'	=>$i->post('alamat'),
						'jk'	=>$i->post('jk'),
						'level'	=>$i->post('level'),
					);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses','Data user telah diedit');
		redirect(base_url('admin/user'));
	}

}

	public function delete($id_user) {
		$data = array('id_user'		=>$id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data user telah dihapus');
		redirect (base_url('admin/user'));
	}


}