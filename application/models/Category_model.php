<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
        	$query = $this->db->get('category');
       		 return $query->result();
        }

          public function detail($id_category) {
        	$query = $this->db->get_where('category',array('id_category' => $id_category));
        	return $query->row();
        }


        public function tambah($data) {
        	$this->db->insert('category',$data);
        }

        public function edit($data) {
        	$this->db->where('id_category',$data['id_category']);
        	$this->db->update('category',$data);
        }

		public function delete($data) {
		$this->db->where('id_category',$data['id_category']);
		$this->db->delete('category',$data);
        }


}