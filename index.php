<!-- TODO: Get dropdown menus working -->
<!-- TODO: Get seatch function working with a DB -->

<!-- include head -->
<?php 
$page_title = 'Bald Eagle Shopping Center';
include ('layouts/head.php');
?>

  <body>

   <!-- include nav -->
   <?php 
    include ('layouts/nav.php');
    ?>

    <main role="main">

      <!-- include jumbo -->
      <?php 
        include ('layouts/jumbotron.php');
      ?>

      <div class="container">
        <!-- Container Heading -->


        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <!-- TODO: center h2 use id for this one -->
            <h2 class="text-center">Categories</h2>
            <hr>
          </div>
          <div class="col-md-4"></div>
        </div>

       <!--  New Arrival Starts Here -->
        <div class="row">
          <!-- TODO: images for categories need to be found and made responsive use vw for width and @media queries as needed -->
          <div class="col-md-4 new-arrival-borders" >
            <h2>Kitchen</h2>
            <img class="new-arrival-img" src="mixer.jpg">
            <!-- TODO: Link the view details to item based on DB -->
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4 new-arrival-borders">
            <h2>Bath</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4 new-arrival-borders">
            <h2>Sporting Goods</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>

        <hr>

      </div> 
      <!-- /container -->

    </main>

<!-- include footer -->
      <?php 
        include ('layouts/footer.php');
      ?>

    <!-- Placed at the end of the document so the pages load faster -->
      <?php 
        include ('layouts/scripts.php');
      ?>
    
  </body>
</html>
