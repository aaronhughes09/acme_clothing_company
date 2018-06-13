<h1 class="text-center">Please select a product</h1>

<?php
// used for dynamic layout
$rowCount = 1;
$i = 0;
?>

<div class="row">

<?php foreach($allProducts as $aP) : ?>
<div class="col card ml-2">  
    
  <img class="img-fluid" id="<?php echo $aP['product_type'];?>" src="<?php echo base_url(); ?>/assets/imgs/<?php echo ${"pictures$i"}[0]; ?>" alt="">
  <br>
  <?php foreach(array_combine(${"colors$i"}, ${"pictures$i"}) as $color => $picture) : ?>
    <button class="picture_button btn btn-outline-primary mt-2" name="<?php echo $picture;?>"><?php echo $color;?></button>
  <?php endforeach; ?>

 <form class="cart" action="<?php echo base_url(); ?>carts/create" method="post">
  <h2><?php echo $aP['product_type'];?></h2>
  <h4>$<?php echo ${"prices$i"}[0]; ?></h4>
  <div class="form-group mt-3">
    <input type="hidden" name="cart_price" value="<?php echo ${"prices$i"}[0]; ?>">
    <input type="hidden" name="cart_product" value="<?php echo $aP['product_type'];?>">
  </div>
  <div class="form-group">
  <div class="form-group">
    <select name="cart_color">
      <?php foreach(${"colors$i"} as $color) : ?>
        <option value="<?php echo $color;?>">
          <?php echo $color;?>
        </option>
        <p><?php echo $color; ?></p>
      <?php endforeach; ?>
    </select>
</div>
  <select name="cart_size">
    <?php foreach(${"sizes$i"} as $size) : ?>
      <option value="<?php echo $size;?>">
        <?php echo $size;?>
      </option>
    <?php endforeach; ?>
  </select>
</div>
<div class="form-group">
  <label for="cart_quantity">Quantity</label>
  <input type="number" name="cart_quantity" min="1" max="99" required>
  <br>
  <button type="submit" class="btn btn-primary">Add to Cart</button>
</div>
</form>
</div>
<?php
  $rowCount++;
  $i++;
  if( $rowCount % 2 <> 0){
    echo "</div><div class='row'>";
  }
?>
<?php endforeach; ?>
<?php
  if( $rowCount % 2 == 0){
    echo "<div class='col'></div>";
  }
?>







