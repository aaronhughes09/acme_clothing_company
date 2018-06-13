<?php

class Products extends CI_Controller{


  public function __construct()
  {
    parent::__construct();
    $this->load->model('products_model');
  }
  
   public function view(){

    //pulls only distinct products into an array
    $newFinal = $this->products_model->get_distinct_products();
    $data['allProducts'] = $newFinal;

    //Stores product name into numbered variables
    for($i = 0; $i < count($newFinal); $i++) {

      //Pulls name of each distinct product to search database
      ${"product$i"} = implode(" ", $newFinal[$i]);

      //Fills an array of the individual product information
      ${"productArray$i"} = $this->products_model->get_individual_products(${"product$i"});
      //Allows array to be used in views
      $data["productArray$i"] = ${"productArray$i"};
        
      //Code to get product prices, remove duplication, and be used in view
      ${"prices$i"} = array();
      foreach (${"productArray$i"} as ${"pA$i"}){
        array_push(${"prices$i"},  ${"pA$i"}['product_price']);
      }
      $data["prices$i"] = array_unique(${"prices$i"});

      //Code to get product sizes, remove duplication, and be used in view
      ${"sizes$i"} = array();
      foreach (${"productArray$i"} as ${"pA$i"}){
        array_push(${"sizes$i"},  ${"pA$i"}['product_size']);
      }
      $data["sizes$i"] = array_unique(${"sizes$i"});

      //Code to get product colors, remove duplication, and be used in view
      ${"colors$i"} = array();
      foreach (${"productArray$i"} as ${"pA$i"}){
        array_push(${"colors$i"},  ${"pA$i"}['product_color']);
      }
      $data["colors$i"] = array_unique(${"colors$i"});

      //Code to get product color pictures, remove duplication, and be used in view
      ${"pictures$i"} = array();
      foreach (${"productArray$i"} as ${"pA$i"}){
        array_push(${"pictures$i"},  ${"pA$i"}['product_picture']);
      }
      $data["pictures$i"] = array_unique(${"pictures$i"});
    }

    $cartTotal = 0;
    $cartItems = $this->products_model->get_cart_list();
    foreach($cartItems as $cartItem){
      $cartTotal += $cartItem['cart_total'];
    }
   
    $totalCart = $this->products_model->get_distinct_cart_info_products();
    $data['cart'] = count($totalCart);
    $data['cartTotal'] = $cartTotal;

    $this->load->view('templates/header', $data);
    $this->load->view('products/index', $data);
    $this->load->view('templates/footer');

  }


}



?>