<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
        	$query = $this->db->get('user');
       		 return $query->result();
        }

         public function listingusers() {
            $query = $this->db->get_where('user',array('level' => 'pelanggan'));
            return $query->result();
        }


          public function detail($id_user) {
        	$query = $this->db->get_where('user',array('id_user' => $id_user));
        	return $query->row();
        }

        public function tambah($data) {
        	$this->db->insert('user',$data);
        }

        public function edit($data) {
        	$this->db->where('id_user',$data['id_user']);
        	$this->db->update('user',$data);
        }

		public function delete($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('user',$data);
        }


}