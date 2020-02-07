<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('slider_model');
               
        }

        public function index()
	{
		// $slider =$this->slider_model->getslider();
		$data = array (	'title' 				=> 'Order',
						// 'slider'				=> $slider

						 );
		$this->load->view('front/layout/head');
		$this->load->view('front/layout/nav.php');
		$this->load->view('Order/index');
		$this->load->view('front/layout/footer');
	}



	

}