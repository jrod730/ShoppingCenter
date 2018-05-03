 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">Bald Eagles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <!-- Left side nav -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.php">About Us</a>
          </li>
          <!-- TODO: Nav should be linked to specific pages -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="products.php?id=1">Bathroom</a>
              <a class="dropdown-item" href="products.php?id=2">Electronics</a>
              <a class="dropdown-item" href="products.php?id=3">Kitchen</a>
            </div>
          </li>
        </ul>
        <!-- Right side nav -->
        <!-- TODO: add a shopping cart icon via Font awesome -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <!-- Check if user has any items in the cart, if so display number -->
            <?php 
            if(isset($_SESSION['id']))
            {
              require_once('/inc/mysqliDB.php'); 
              // Certain user ID check & status of the item needs to be active
              $result = $mysqli->query("SELECT * FROM `cart` WHERE `user_id` = ".$_SESSION['id']." && `status_id` = 3");
              if($result)
              {
                $count = $result->num_rows;
            ?>
            <a class="nav-link" href="cart.php">
              <span class="fa-stack" data-count="<?php echo $count; ?>">
                <i class="fas fa-shopping-cart"></i>
              </span>
            </a>
            <?php }
            } else { ?>
            <a class="nav-link" href="cart.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
            <?php 
              }
            ?>
          </li>
          <li class="nav-item"><a class="nav-link" href="orders.php" title="orders">Orders</a></li>
              <?php 
              if(isset($_SESSION['username'])) {
                echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' ;
                    echo $_SESSION['username']; 
                  echo '<i class="fas fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>';
                
              }
              else
              {
                echo '<li class="nav-item">
                  <a class="nav-link" href="login.php">';
                    echo 'login';
                    echo '<i class="fas fa-user"></i>
                  </a>
                </li>';
              }


              ?>
       
        </ul>
        <form method="post" action="search.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"  name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>