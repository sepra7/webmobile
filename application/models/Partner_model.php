<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
        	$query = $this->db->get('partner');
       		 return $query->result();
        }

         public function getpartner() {
            $this->db->select('*');
            $this->db->from('partner');
            $this->db->limit(10);  // Produces: LIMIT 10;
             $query = $this->db->get();
             return $query->result();
        }

          public function detail($id_partner) {
        	$query = $this->db->get_where('partner',array('id_partner' => $id_partner));
        	return $query->row();
        }


        public function tambah($data) {
        	$this->db->insert('partner',$data);
        }

        public function edit($data) {
        	$this->db->where('id_partner',$data['id_partner']);
        	$this->db->update('partner',$data);
        }

		public function delete($data) {
		$this->db->where('id_partner',$data['id_partner']);
		$this->db->delete('partner',$data);
        }


}