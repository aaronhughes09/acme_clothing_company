<?php

  class Carts_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    public function get_distinct_cart_info(){
      $query = $this->db->query("SELECT DISTINCT cart_id FROM cart");
      return $query->result_array();
    }

    public function get_cart_list(){
      $query = $this->db->query("SELECT * FROM cart");
      return $query->result_array();
    }

    public function delete_cart_item(){
      
      $cart_id = $this->input->post('cart_id');
      return $this->db->delete('cart', array('cart_id' => $cart_id));
    
    }

    public function update_cart(){
     
      $cartPrice = $this->input->post('cart_price');
      $cartQuantity = $this->input->post('cart_quantity');
      $cartTotal = $cartPrice * $cartQuantity;

      $data = array(
        'cart_customer_id' => 1,
        'cart_product' => $this->input->post('cart_product'),
        'cart_color' => $this->input->post('cart_color'),
        'cart_size' => $this->input->post('cart_size'),
        'cart_quantity' => $this->input->post('cart_quantity'),
        'cart_total' => $cartTotal
      );

      $quant = $this->input->post('cart_quantity');
      $product = $this->input->post('cart_product');
      $color = $this->input->post('cart_color');
      $size = $this->input->post('cart_size');
      
      $query = $this->db->query("SELECT * FROM cart WHERE cart_product = '$product' AND cart_color = '$color' AND cart_size = '$size'");
      $updater = $query->result_array();
      
      if($updater == NULL){
        return $this->db->insert('cart', $data);
      } else {
          $origPrice = $updater[0]["cart_total"] / $updater[0]["cart_quantity"];
          $quant += $updater[0]["cart_quantity"];
          $price = $quant * $origPrice;
          $newArray = array(
            'cart_quantity' => $quant,
            'cart_total' => $price
          );

          $this->db->where('cart_id', $updater[0]['cart_id']);
          $this->db->update('cart', $newArray);

        }
      }

      
      
      

    }
?>