<?php
	
	// $conn is used for db connection
	require_once('dbconnection.php');


	// head
	$page_title = 'Login Page';
	require_once('layouts/head.php');
?>

<body class="text-center">
	<!-- inlclude nav -->
	<?php require_once('layouts/nav.php'); ?>

    <form class="form-signin login-form" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br> <hr>
        <!-- include footer -->
      <?php 
        require_once('layouts/footer.php');
      ?>
    </form>
    <br />
    <hr>
    <!-- Placed at the end of the document so the pages load faster -->
      <?php 
        require_once('layouts/scripts.php');
      ?>
    
  </body>
</html>