<!-- include head -->
<?php 
session_start(); //starts seesion for username this needs to be at the top of every page.
$page_title = 'Bald Eagle Shopping Center';
require_once('layouts/head.php');
require_once('inc/mysqliDB.php'); 
?>
  <body>
 <?php require_once('layouts/nav.php'); 
        if (isset($_SESSION['id']))
        {
 ?>
    <main role="main">
      <div class="container">
        <!-- Container Heading -->
        <div class="row">
          <table id="cartTable" class="table">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
        <?php
          $userID = $_SESSION['id'];
          $q = "SELECT * FROM `cart` WHERE `status_id` = 1 && `user_id` = ".$userID;
          $result = $mysqli->query($q);
          if($result->num_rows > 0)
          {
            while($row = $result->fetch_object())
            {
              $qr = "SELECT * FROM `product` WHERE id = ".$row->product_id;
              if ($resQR = $mysqli->query($qr))
              {
              $rowProduct = $resQR->fetch_assoc();
            echo 
              '<tr>
                <td><img src="img/products/'.$rowProduct["url"].'" height="50" /></td>
                <td>'.$rowProduct["name"].'</td>
                <td>'.$rowProduct["description"].'</td>
                <td>'.$rowProduct["price"].'</td>
              </tr>';
              }
            }
          }
        
        ?>
          </tbody>
        </table>
        </div> 
        <hr>
      </div> 
      <!-- /container -->
    </main>
<!-- include footer -->
      <?php 
      } else 
          echo "<h1>Please <a href='login.php'>login</a></h1>";

        require_once('layouts/footer.php');
        require_once('layouts/scripts.php');
      ?>
  </body>
</html>
