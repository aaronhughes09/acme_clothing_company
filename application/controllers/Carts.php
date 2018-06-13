<?php

class Carts extends CI_Controller{


    public function __construct()
    {
      parent::__construct();
      $this->load->model('carts_model');
    }

    public function create(){

      $querys = $this->carts_model->update_cart();
      redirect('products','refresh');
                   
    }  

    public function delete(){
      
      $this->carts_model->delete_cart_item();
      redirect('carts','refresh');
      
    }  

  public function view(){

    $cartTotal = 0;
    $cartItems = $this->carts_model->get_cart_list();
    foreach($cartItems as $cartItem){
      $cartTotal += $cartItem['cart_total'];
    }
    
    $data['cartTotal'] = $cartTotal;
    $data['cartItems'] = $this->carts_model->get_cart_list();
    $totalCart = $this->carts_model->get_distinct_cart_info();
    $data['cart'] = count($totalCart);
    
    $this->load->view('templates/header', $data);
    $this->load->view('carts/index', $data);
    $this->load->view('templates/footer');
  }

}
?>