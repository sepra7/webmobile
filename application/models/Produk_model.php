<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

        public function listing() {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('category','category.id_category=produk.id_category');
             $this->db->order_by('id_produk','DESC');
             $query = $this->db->get();
             return $query->result();
        }

         public function getproduk() {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('category','category.id_category=produk.id_category');
            $this->db->limit(6);  // Produces: LIMIT 10;
             $this->db->order_by('id_produk','DESC');
              $query = $this->db->get();
             return $query->result();
         }

          public function detail($id_produk) {
        	$query = $this->db->get_where('produk',array('id_produk' => $id_produk));
        	return $query->row();
        }

        public function tambah($data) {
        	$this->db->insert('produk',$data);
        }

        public function edit($data) {
        	$this->db->where('id_produk',$data['id_produk']);
        	$this->db->update('produk',$data);
        }

		public function delete($data) {
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->delete('produk',$data);
        }


}