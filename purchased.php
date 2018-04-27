<?php 

	require_once('dbconnection.php');
	session_start(); //starts seesion for username this needs to be at the top of every page.

	// head
	$page_title = 'Previously Purchased';
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
        		if(isset($_SESSION['username'])){
        			echo $_SESSION['username']. "'s  Previously Purchased Items <hr>" ;

        		}
        		else{
        			echo "You must sign in to see previously purchased items. <hr>";
        		}
			?>
        	
        </h1>
        <a id="prev" href="cart.php">Back to Cart</a>

        <ul class="panel panel-default">
  	
       		<?php 
       			
             	$total = 0;

       			$sql = "SELECT user.username, status.status_type, product.product_name, product.price, product.id  from cart
						inner join status
						on status.id = cart.status_id
						inner join user
						on user.id = cart.user_id
						inner join product
						on product.id = cart.product_id
						WHERE status_type = 'purchased' AND username = '".$_SESSION['username']."'";

				$result = $conn->query($sql);

			
				if ($result->num_rows > 0) {
    					// output data of each row
    					echo "<h3>" .$result->num_rows. " item(s) in cart </h3>";
    					
    					
    					while($row = $result->fetch_assoc()) {

        			        echo '<li class="list-group-item" name="'.$row["product_name"].'">'
        							       .$row["product_name"]. ' - $'. $row["price"].
        							       '<input type="hidden" name="item_name" value="'.$row["product_name"].'"> 
                            </li>';
        					
        					$total += floatval($row['price']);
        					
    					}//END WHILE

    					echo '<h3><strong> Total Previously Purchased Amount: '.$total.'</strong><h3>';

				} else {
    				
    				echo "<h3> YOUR CART IS EMPTY! BUY SOMETHING! </h3>";
				}
				echo '</div>'
       		?>

        </ul>
        <hr>
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
