<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 public function __construct()
        {
                parent::__construct();
	                $this->load->model('slider_model');
	                $this->load->model('gallery_model');
	                $this->load->model('produk_model');
	                $this->load->model('partner_model');
	                $this->load->model('testimonial_model');
	                
               
        }

	public function index()
	{
		$slider =$this->slider_model->getslider();
		$galeri =$this->gallery_model->getgaleri();
		$produk =$this->produk_model->getproduk();
		$partner =$this->partner_model->getpartner();
		$testimonial =$this->testimonial_model->listing();

		$data = array ('title' => 'Fun Race | Event Race',
						'slider'=> $slider,
						'galeri' =>$galeri,
						'produk' =>$produk,
						'partner' =>$partner,
						'testimonial' => $testimonial
					);
		$this->load->view('front/layout/wrapper', $data);
	}

}	