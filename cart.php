
<!-- TODO: This page contains a ton of spaghetti code we should make more modular by having a cart functionality page with functions and such in an actual implementation -->
<?php 

	require_once('dbconnection.php');
	session_start(); //starts seesion for username this needs to be at the top of every page.

	// head
	$page_title = 'Cart';
	require_once('layouts/head.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	
		//Handles deleted items
		if (isset($_POST['delete'])) {

			
			//Get product id by name
			$sql = "SELECT id FROM product 
					WHERE product_name = '".$_POST['item_name']."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$product_id = $row['id'];

			// Now remove item from cart
  			$remove = "DELETE FROM cart 
  						WHERE product_id = ".$product_id;

   			if(!$conn->query($remove) === true) {
       			echo $conn->error;               
   			}
		}
	}
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
        			echo $_SESSION['username']. "'s  Cart <hr>" ;

        		}
        		else{
        			echo "Your Cart <hr>";
        		}
			?>
        	
        </h1>
        <a id="prev" href="purchased.php">Previous Purchases</a>

        <ul class="panel panel-default">
  	
       		<?php 
       			
             	$total = 0;

       			// TODO: check if user has an active cart if they do then display itemes
       			$sql = "SELECT user.username, status.status_type, product.product_name, product.price, product.id  from cart
						inner join status
						on status.id = cart.status_id
						inner join user
						on user.id = cart.user_id
						inner join product
						on product.id = cart.product_id
						WHERE status_type = 'active' AND username = '".$_SESSION['username']."'";

				$result = $conn->query($sql);

				// TODO: add a remove from cart
				if ($result->num_rows > 0) {
    					// output data of each row
    					echo "<h3>" .$result->num_rows. " item(s) in cart </h3>";
    					
    					
    					while($row = $result->fetch_assoc()) {

        			        echo '<li class="list-group-item" name="'.$row["product_name"].'"><form action="cart.php" method="post">'
        							.$row["product_name"]. ' - $'. $row["price"].
        							'<input type="hidden" name="item_name" value="'.$row["product_name"].'"> 
        							  <button class="badge" type="submit" name="delete"> X </button> </form></li>';
        					
        					$total += floatval($row['price']);
        					
    					}//END WHILE

    					echo '<h3><strong> Total: '.$total.'</strong><h3>';

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
