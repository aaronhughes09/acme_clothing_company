<html>
<head>
  <title>Acme Clothing Company</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <div class="container">
      <a href="<?php echo base_url(); ?>" class="navbar-brand">ACME Clothing Company</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>carts" class="nav-link">Cart</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>customers" class="nav-link">Checkout</a>
        </li>
        <li class="nav-item pull-right text-light">
          <a href="<?php echo base_url(); ?>carts" class="nav-link"><span class="badge badge-secondary"><?php echo $cart . " "; ?></span><i class="fas fa-shopping-cart ml-1"></i><?php echo "$" . number_format((float)$cartTotal, 2, '.', ''); ?></a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">