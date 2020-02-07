<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pernikahan extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('slider_model');
               
        }

        public function index()
	{
		$slider =$this->slider_model->getslider();
		$data = array (	'title' 				=> 'Pernikahan',
						'slider'				=> $slider

						 );
		$this->load->view('front/layout/head');
		$this->load->view('front/layout/navpernikahan.php');
		$this->load->view('pernikahan/pernikahan',$data);
		$this->load->view('front/layout/footer');
	}



	

}