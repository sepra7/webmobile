<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

        public function __construct() {
                $this->load->database();
        }

      public function listinguser() {
          $this->db->select('testimonial.*,user.nama as namapel ');
          $this->db->from('testimonial');
            $this->db->join('user','user.id_user=testimonial.id_user');
            $this->db->where('testimonial.id_user', $this->session->userdata('id'));
            $this->db->limit(1);
            $this->db->order_by('id_testimonial','DESC');
             $query = $this->db->get();
           return $query->result();
        }


          public function listing() {
          $this->db->select('testimonial.*,user.nama as namapel ');
          $this->db->from('testimonial');
            $this->db->join('user','user.id_user=testimonial.id_user');
            $this->db->order_by('id_testimonial','DESC');
            $this->db->group_by("id_user");
        $query = $this->db->get();
             return $query->result();
        }
public function tambah($data) {
          $this->db->insert('testimonial',$data);
        }


        
}