<?php

  class Confirmations_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    public function get_cart_list_and_delete(){
      
      $query = $this->db->query("SELECT * FROM cart");
      $cart_id = 1;
      $this->db->delete('cart', array('cart_customer_id' => $cart_id));
      return $query->result_array();

    }

    public function get_customer_info(){
      
      $query = $this->db->query("SELECT * FROM customers");
      return $query->last_row('array');

    }

  }