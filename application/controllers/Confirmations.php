<?php

class Confirmations extends CI_Controller{


    public function __construct()
    {
      parent::__construct();
      $this->load->model('confirmations_model');
    }

    public function view()
    {  
    //This is where I would've included the confirmation email to customer
    //$email = $this->confirmations_model->get_customer_info();
    //   
    // $to = $email['customer_email];
    // $subject = "Acme Clothing Company Order";
    // $msg = "
    // <html>
    // <html>
    // <head>
    // <title>Acme Clothing Company</title>
    // </head>
    //    Would have used code similar to confirmation page
    // </body>
    // </html>
    //";
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // $headers .= 'From: <CustomerSupport@acmeclothingcompany.com>' . "\r\n";
    // mail($to,$subject,$message,$headers);
     
    $data['completeOrder'] = $this->confirmations_model->get_cart_list_and_delete();
    $data['customerInfo'] = $this->confirmations_model->get_customer_info();
    $this->load->view('templates/confirmation_header');
    $this->load->view('confirmations/index', $data);
    $this->load->view('templates/footer');

    }

}