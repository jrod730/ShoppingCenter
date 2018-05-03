<!-- head -->
<?php 
// Check if GET request for certain category sent in, if not redirect homepage
if(!$_GET['id'])
  header("Location: index.php");

$page_title = 'Bald Eagle Shopping Center - Products Page';
require_once('layouts/head.php');
?>

  <body>

   <!-- include nav -->
   <?php 
    require_once('layouts/nav.php');
    ?>

    <main role="main">
      <div class="container">
        <div class="row">
        <!-- Container Heading -->
          <!-- DB -->
          <?php require_once('inc/mysqliDB.php'); 
            $result = $mysqli->query("SELECT * FROM `product` WHERE category_id = ".$_GET['id']);
            if($result)
            {
              while($row = $result->fetch_object())
              { ?>
              <div class="col-sm border">
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
                      <a href="#" class="btn btn-success add-cart-btn">ADD TO CART</a>
                    </div>
                  </div>
              </div>
              <?php }
            $result->close();
            }
          ?>
        </div> 
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
