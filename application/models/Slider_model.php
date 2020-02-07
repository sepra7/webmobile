<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
        	$query = $this->db->get('slider');
       		 return $query->result();
        }

         public function getslider() {
            $this->db->select('*');
            $this->db->from('slider');
            $this->db->limit(3);  // Produces: LIMIT 10;
             $query = $this->db->get();
             return $query->result();
        }

          public function detail($id_slider) {
        	$query = $this->db->get_where('slider',array('id_slider' => $id_slider));
        	return $query->row();
        }


        public function tambah($data) {
        	$this->db->insert('slider',$data);
        }

        public function edit($data) {
        	$this->db->where('id_slider',$data['id_slider']);
        	$this->db->update('slider',$data);
        }

		public function delete($data) {
		$this->db->where('id_slider',$data['id_slider']);
		$this->db->delete('slider',$data);
        }


}