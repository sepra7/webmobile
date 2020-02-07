<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends CI_Controller {
	
        public function index()
	{
		
		$data = array (	'title' 				=> 'Undangan',
					
						 );
		$this->load->view('front/layout/head');
		$this->load->view('front/layout/navpernikahan.php');
		$this->load->view('undangan/undangan',$data);
		$this->load->view('front/layout/footer');
	}



	

}