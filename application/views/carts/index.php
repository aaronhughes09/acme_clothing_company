<?php if (count($cartItems) <> 0): ?>
<div class="card text-left">
<table class="table table-striped text-left">
  <thead>
    <th>Product</th>
    <th>Color</th>
    <th>Size</th>
    <th>Quantity</th>
    <th>Price</th>
  </thead>
  <tbody>
<?php foreach($cartItems as $cartItem) : ?>
  <tr>
    <td><?php echo $cartItem['cart_product']; ?></td>
    <td><?php echo $cartItem['cart_color']; ?></td>
    <td><?php echo $cartItem['cart_size']; ?></td>
    <td><?php echo $cartItem['cart_quantity']; ?></td>
    <td>$<?php echo $cartItem['cart_total']; ?></td>
    <form class="delete" action="<?php echo base_url(); ?>carts/delete" method="post">
    <td><button type="submit" name="cart_id" value="<?php echo $cartItem['cart_id']; ?>" onclick="return confirm('Do you want to remove this item from your cart?')" class="delete btn btn-danger">Delete</button></td>
    </form>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

 <h3 class="text-center">Cart Total: $<?php echo number_format((float)$cartTotal, 2, '.', ''); ?></h3>
 <a href="<?php echo base_url(); ?>customers" class='btn btn-outline-primary'>Proceed to Checkout</a>
 </div>
 <?php else: ?>
<div class="jumbotron text-center">
  <h3>Cart is empty. Please add an item to proceed.</h3><a href="<?php echo base_url(); ?>" class='btn btn-outline-primary mt-2 mb-2'>Return to Home Page</a>
<?php endif; ?>