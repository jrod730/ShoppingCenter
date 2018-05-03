<!-- include head -->
<?php 
session_start(); //starts seesion for username this needs to be at the top of every page.
$page_title = 'Bald Eagle Shopping Center';
require_once('layouts/head.php');
require_once('inc/mysqliDB.php'); 
?>

  <body>
 <?php 
 if(isset($_GET['msg']))
  if($_GET['msg']==2) {
 ?>
<div class="alert alert-success">
  <strong>Success!</strong> 
  <?php // Get the item ID of the item added to cart and query the name of that and display
    $itemID = $_GET['itemID'];
    $result = $mysqli->query("SELECT * FROM `product` WHERE `id` = ".$itemID);
    $row = $result->fetch_object();
    
    if($row) {
      echo $row->name;
    }
  ?>
  has been added to your cart.
</div>
 <?php 
 } else if ($_GET['msg']==1) {
  ?>
    <div class="alert alert-warning">
      <strong>Warning!</strong> 
      <?php // Get the item ID of the item added to cart and query the name of that and display
        $itemID = $_GET['itemID'];
        $result = $mysqli->query("SELECT * FROM `product` WHERE `id` = ".$itemID);
        $row = $result->fetch_object();
        
        if($row) {
          echo $row->name;
        }
      ?>
      is already in your cart.
    </div>
    <?php
   } else if($_GET['msg']==0) {
 ?>
    <div class="alert alert-warning">
      <strong>Warning!</strong> 
      Try to add that item to your cart again.
</div>
 <?php 
  } // end success
    require_once('layouts/nav.php');
    ?>

    <main role="main">

      <!-- include jumbo -->
      <?php 
        require_once('layouts/slider.php');
      ?>

      <div class="container">
        <!-- Container Heading -->
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <h2 class="text-center">Products</h2>
            <hr>
          </div>
          <div class="col-md-4"></div>
        </div>

       <!--  New Arrival Starts Here -->
        <div class="row">
        <!-- Container Heading -->
          <!-- DB -->
          <?php 
            $result = $mysqli->query("SELECT * FROM `product`");
            if($result)
            {
              while($row = $result->fetch_object())
              { ?>
              <div class="col-md-4 border">
                <div class="row img-part pt-2 pb-2">
                    <div class="col-md-12 col-sm-12 colxs-12 img-section">
                      <img src="img/products/<?php echo $row->url; ?>" width="200" height="200" />
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 image-title">
                      <h3><?php echo $row->name; ?></h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 image-description">
                      <p><?php echo $row->description; ?></p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      Price: <?php echo $row->price; ?><br />
                      <?php 
                        if(isset($_SESSION['id'])){
                      ?>
                      <a href="inc/add-to-cart.php?<?php echo "userID=".$_SESSION['id']."&itemID=".$row->id; ?>" class="btn btn-success add-cart-btn">ADD TO CART</a>
                        <?php
                      } else {
                        echo '<p><a href="login.php">Login to add to cart</a></p>';
                      } ?>
                    </div>
                  </div>
              </div>
              <?php }
            $result->close();
            }
          ?>
        </div> 
        <hr>
      </div> 
      <!-- /container -->
    </main>
<!-- include footer -->
      <?php 
        require_once('layouts/footer.php');
        require_once('layouts/scripts.php');
      ?>
  </body>
</html>
