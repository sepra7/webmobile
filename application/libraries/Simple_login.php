<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('user', array(
										'username' => $username, 
										'password' => $password,
									
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1 ) {
			$row 	= $this->CI->db->query('SELECT * FROM user WHERE username = "'.$username.'"');
			$admin 	= $row->row();
			$id 	= $admin->id_user;
			$level	= $admin->level;
			$this->CI->session->set_userdata('username', $username); 	
			$this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('level', $level);
			// Kalau benar di redirect			
			if ($admin->level == 'admin') {
				redirect(base_url('admin/user'));
			} elseif ($admin->level =='pelanggan') {
				redirect(base_url('users/pemesanan'));
			}
			
		}else{
			$this->CI->session->set_flashdata('sukses','Oopss.. Username/password salah');
			redirect(base_url().'login');
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('username') == '' ) {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('login'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'login');
	}
}