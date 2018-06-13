<?php

  class Products_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }
    
    public function get_distinct_products(){
      $query = $this->db->query("SELECT DISTINCT product_type FROM products");
      return $query->result_array();
    }

    public function get_distinct_cart_info_products(){
      $query = $this->db->query("SELECT DISTINCT cart_id FROM cart");
      return $query->result_array();
    }

    #Function to grab individual products from database based on 'type' passed in
    public function get_individual_products($type){
      $query = $this->db->get_where('products', array('product_type' => $type));
      return $query->result_array();
    }

    public function get_cart_list(){
      $query = $this->db->query("SELECT * FROM cart");
      return $query->result_array();
    }   
  }
?>