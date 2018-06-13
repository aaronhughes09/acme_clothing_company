<?php if (count($cartItems) <> 0): ?>
<h3>Checkout Page</h3>
<div class="card p-5">
<form class="customers" action="<?php echo base_url(); ?>customers/create" method="post">
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required validate>
  </div>
  <button type="submit" onclick="return confirm('Do you want to complete your order?')" class="btn btn-primary">Place Order</button>
</form>
</div>

<?php else: ?>
<div class="jumbotron text-center">
  <h3>Cart is empty. Unable to checkout at this time.</h3><a href="<?php echo base_url(); ?>" class='btn btn-outline-primary mt-2 mb-2'>Return to Home Page</a>
<?php endif; ?>