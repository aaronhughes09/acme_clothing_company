<div class="container">
<div class="jumbotron text-center mt-2">
  <h3>Thank you for your purchase, <?php echo $customerInfo['customer_first_name']; ?>!</h3>
</div>
<div class="card mb-3">
  <h4>Email: <?php echo $customerInfo['customer_email']; ?></h4>
  <h4>Name: <?php echo $customerInfo['customer_first_name'] . " " . $customerInfo['customer_last_name']; ?></h4>
  <h4>Purchase Date: <?php echo $customerInfo['date_of_purchase']; ?></h4>
  <h4>Total amount: $<?php echo $customerInfo['amount_of_purchase']; ?></h4>
  <a href="<?php echo base_url(); ?>" class="btn btn-primary">Start New Order</a>
</div>


<table class="table table-striped text-left">
  <thead>
    <th>Product</th>
    <th>Color</th>
    <th>Size</th>
    <th>Quantity</th>
    <th>Price</th>
  </thead>
  <tbody>
<?php foreach($completeOrder as $order) : ?>
  <tr>
    <td><?php echo $order['cart_product']; ?></td>
    <td><?php echo $order['cart_color']; ?></td>
    <td><?php echo $order['cart_size']; ?></td>
    <td><?php echo $order['cart_quantity']; ?></td>
    <td>$<?php echo $order['cart_total']; ?></td> 
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>

