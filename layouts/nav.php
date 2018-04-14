 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Bald Eagles eCommerce</a>
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
            <a class="nav-link" href="#">Coupons</a>
          </li>
          <!-- TODO: Nav should be linked to specific pages -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Kitchen</a>
              <a class="dropdown-item" href="#">Bath</a>
              <a class="dropdown-item" href="#">Electronics</a>
            </div>
          </li>
        </ul>
        <!-- Right side nav -->
        <!-- TODO: add a shopping cart icon via Font awesome -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login <i class="fas fa-user"></i></a>
          </li>
        </ul>
        <form method="post" action="search.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"  name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>