<?php
	
	// $conn is used for db connection
	require_once('dbconnection.php');
  session_start(); //starts seesion for username this needs to be at the top of every page.



	// head
	$page_title = 'Search Results';
	require_once('layouts/head.php');
?>

<body>
	<!-- inlclude nav -->
	<?php require_once('layouts/nav.php'); ?>

	<main role="main">

      <!-- include jumbo -->
      <?php 
        require_once('layouts/jumbotron.php');
      ?>

      <div class="container">
        <!-- Container Heading -->
        <h1>
        	<?php 
				    if (empty($_POST['search'])){

       			  echo 'No Results Found <br> <hr>'; 
    			  }
    			  else{
        			
        			// TODO: List all the data winthin our db utilizing joins
        			// TODO: Create a link within the product name which goes to page to display product. May be too complex for this project but worth a try.

        			$sql = "SELECT product_name, description, price FROM product WHERE product_name LIKE '%".$_POST['search']."%'";
					    $result = $conn->query($sql);

					  if ($result->num_rows > 0) {
    					// output data of each row
    					echo $result->num_rows. " Result(s) Found <br> <br>";

    					while($row = $result->fetch_assoc()) {
        					echo "$".$row["price"]. " - ". $row["product_name"]." - " . $row["description"]. "<br> <hr>";
    					}

					  } else {

    					echo "No Results Found <br> <hr>";
					  }

					$conn->close();

    			}
        	?>
        		
        </h1>

        <div class="row">
          
       

        </div>

      </div> 
      <!-- /container -->

    </main>

<!-- include footer -->
      <?php 
        require_once('layouts/footer.php');
      ?>

    <!-- Placed at the end of the document so the pages load faster -->
      <?php 
        require_once('layouts/scripts.php');
      ?>
    
  </body>
</html>



