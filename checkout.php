
<!-- TODO: This page contains a ton of spaghetti code we should make more modular by having a cart functionality page with functions and such in an actual implementation -->
<?php 

  require_once('inc/mysqliDB.php'); 
    session_start(); //starts seesion for username this needs to be at the top of every page.

    // head
    $page_title = 'Cart';
    require_once('layouts/head.php');
 ?>
 <body>
    <!-- inlclude nav -->
    <?php require_once('layouts/nav.php'); ?>


  <?php 
    if(isset($_SESSION['username'])) {
  ?>
    <main role="main">
      <div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>
                <?php echo $_SESSION['username']."'s  Cart"; ?>
            </h1>
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

        $total = 0;

        $userID = $_SESSION['id'];
        $q = "SELECT * FROM `cart` WHERE `status_id` = 3 && `user_id` = ".$userID;
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

                        $total += $rowProduct["price"];
                      }
                    }
                    }
                    ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align='right'>
                                <a href="inc/process.php?pID=2&userID=<?php echo $_SESSION['id']; ?>" class="btn btn-info add-cart-btn">Empty</a>
                            </td>
                            <td>
                                <?php 
                  echo "<div align='right'>Total $".$total."</div>";
                ?>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <br />
            <h3 class="panel-title display-td">Payment Details</h3>
            <img class="img-responsive pull-right" src="img/CCs.jpg" />
            <br />
            <label for="cardNumber">CARD NUMBER</label>
            <input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus />
            <div class="row">
                <div class="col-md-6">
                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span> DATE</label>
                    <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required />
                </div>
                <div class="col-md-6">
                    <label for="cardCVC">CV CODE</label>
                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required />
                </div>
            </div>
            <br />
            <div align="right">
                <a href="inc/process.php?pID=1&userID=<?php echo $_SESSION['id']; ?>" class="btn btn-primary add-cart-btn">Buy</a>
            </div>
        </div>
    </div>
<hr>
</div>
    </main>
    <?php
  } else
    echo "<h1>Please <a href='login.php'>login</a></h1>";
        require_once('layouts/footer.php');
        require_once('layouts/scripts.php');
      ?>
  </body>
</html>