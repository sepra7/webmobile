<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

      public function listinguser() {
          $this->db->select('pemesanan.*,user.nama as namapel ');
          $this->db->from('pemesanan');
            $this->db->join('user','user.id_user=pemesanan.id_user');
            $this->db->where('pemesanan.id_user', $this->session->userdata('id'));
             $this->db->order_by('id_pemesanan','DESC');
             $query = $this->db->get();
           return $query->result();
        }

        public function listing() {
          $this->db->select('pemesanan.*,user.nama as namapel ');
          $this->db->from('pemesanan');
            $this->db->join('user','user.id_user=pemesanan.id_user');
             $this->db->order_by('id_pemesanan','DESC');
             $query = $this->db->get();
           return $query->result();
        }


          public function detail($id_pemesanan) {
        	$query = $this->db->get_where('pemesanan',array('id_pemesanan' => $id_pemesanan));
        	return $query->row();
        }

          public function detailpesanan($nama) {
            $query = $this->db->get_where('pemesanan',array('nama' => $nama));
            return $query->row();
        }

         public function getdata($kode){
          $this->db->select('*');
            $this->db->from('category');
             $this->db->WHERE('id_category',$kode);
             $query = $this->db->get();
             return $query->result();   
    }


        public function tambah($data) {
        	$this->db->insert('pemesanan',$data);
        }

        public function edit($data) {
        	$this->db->where('id_pemesanan',$data['id_pemesanan']);
        	$this->db->update('pemesanan',$data);
        }

		public function delete($data) {
		$this->db->where('id_pemesanan',$data['id_pemesanan']);
		$this->db->delete('pemesanan',$data);
        }


}