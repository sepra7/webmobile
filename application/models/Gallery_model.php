<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
        	$query = $this->db->get('gallery');
       		 return $query->result();
        }

         public function getgaleri() {
            $this->db->select('*');
            $this->db->from('gallery');
            $this->db->limit(6);  // Produces: LIMIT 10;
             $query = $this->db->get();
             return $query->result();
        }

          public function detail($id_gallery) {
        	$query = $this->db->get_where('gallery',array('id_gallery' => $id_gallery));
        	return $query->row();
        }


        public function tambah($data) {
        	$this->db->insert('gallery',$data);
        }

        public function edit($data) {
        	$this->db->where('id_gallery',$data['id_gallery']);
        	$this->db->update('gallery',$data);
        }

		public function delete($data) {
		$this->db->where('id_gallery',$data['id_gallery']);
		$this->db->delete('gallery',$data);
        }


}