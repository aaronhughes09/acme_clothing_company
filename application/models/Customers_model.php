<?php

  class Customers_model extends CI_Model{

    public function __construct(){
      $this->load->database();
      $this->load->dbforge();
    }

    public function get_cart_list(){
      $query = $this->db->query("SELECT * FROM cart");
      return $query->result_array();
    }

    public function add_customer(){

      //Get the number of columns in the customer table
      $numOfColumns = $this->db->query("SELECT * FROM customers");
      $customerTableColumns =  $numOfColumns->num_fields();
      //Get the number of distinct products in the original DB
      $originalProductCount = ($customerTableColumns - 6) / 2;
   
      //Get the number of distinct products in the (possibly new) DB
      $numOfProducts = $this->db->query("SELECT DISTINCT product_type FROM products");
      $newProductCount = (count($numOfProducts->result_array()) - $originalProductCount);
      
      //Creates dynamic variables (to be used in customers table)
      $allProducts = count($numOfProducts->result_array());
      $productArray = $numOfProducts->result_array();
      $productIndex = 1;
      for($i = 0; $i < $allProducts; $i++){
          ${"product_type$productIndex"} = $productArray[$i]['product_type'];
          ${"product_count$productIndex"} = 0;
          $productIndex++;
      }
         
      //Create new columns for each product in customer table(if necessary)
      if($originalProductCount <> $newProductCount){
        $newIndex = $originalProductCount + 1;
        for($i = 0; $i < $newProductCount; $i++){         
          $fields = array(
            'product_type' . $newIndex => array(
              'type' => 'VARCHAR',
              'constraint' => '255',     
            ),
            'product_count' . $newIndex => array(
                    'type' => 'INT',
            ),
          );
          $this->dbforge->add_column('customers', $fields);

          $newIndex++;
        }
      } 

      //Used to cycle through all rows in cart table
      $query = $this->db->query("SELECT * FROM cart");
      $carts = $query->result_array();

      //Creates an array of products/counts to add into the customer table
      $finalCustomerArray = array();
      $finalCustomerTotal = 0;
      foreach($carts as $cart){
        for($i = 1; $i <= $allProducts; $i++){
          if( ${"product_type$i"} == $cart['cart_product']){
            ${"product_count$i"} += $cart['cart_quantity'];
            $finalCustomerArray['product_type'. $i] = ${"product_type$i"};
            $finalCustomerArray['product_count'. $i] = ${"product_count$i"}; 
          }
        }
        $finalCustomerTotal += $cart['cart_total'];
      }

      //Gets remaining data for customer table and adds it to database
      $finalCustomerArray['customer_email'] = $this->input->post('email');
      $finalCustomerArray['customer_first_name'] = $this->input->post('first_name');
      $finalCustomerArray['customer_last_name'] = $this->input->post('last_name');
      $finalCustomerArray['amount_of_purchase'] = $finalCustomerTotal;
      $this->db->insert('customers', $finalCustomerArray);
      
    }




  }