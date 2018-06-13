  
  <div style="height:750px"></div>
  <footer class="footer fixed-bottom bg-light">
      <div class="container text-sm-center mt-1">
        <?php 
            date_default_timezone_set("America/New_York");
         ?>
         <p><?php echo date("l, F jS Y"); ?></p>
        <p><em>&copy <?php echo date("Y"); ?> ACME Clothing Company</p>
      </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){

    $(".picture_button").click(function(){
        var updateImage = $(this).attr('name');
        var imageName = updateImage.split("_");
        var x = imageName[0];
        
        $("#" + x).attr("src", "http://localhost/acme/assets/imgs/" + updateImage);
        
    });

        
    $(".cart").submit(function(event){
        alert("Your order has been added to the cart");
    });



    // function confirm() {
    //     confirm("Are you sure you want to delete this?");
    // }
    
    
    
});

</script>


</body>
</html>