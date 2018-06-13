<?php

class Customers extends CI_Controller{


    public function __construct()
    {
      parent::__construct();
      $this->load->model('customers_model');
    }

    public function create(){
      $this->customers_model->add_customer();
      redirect('confirmations','refresh');
    }

    public function view()
    {

    $data['cartItems'] = $this->customers_model->get_cart_list();
    $this->load->view('templates/checkout_header', $data);
    $this->load->view('customers/index', $data);
    $this->load->view('templates/footer');

    }

}