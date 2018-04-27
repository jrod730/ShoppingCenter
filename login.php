
<!-- TODO: Add Logout page eventually if time permits. -->
<!-- TODO: Make a more robust login page. This is very primitive handling of the login page. Vunerable to injection attack and no user token implemented.  -->

<?php
	
	// $conn is used for db connection
	require('dbconnection.php');
  session_start(); //starts seesion for username this needs to be at the top of every page.
	$page_title = 'Login Page';
	require_once('layouts/head.php');



  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $errors = array(); // Initialize an error array.

  // Check for a username:
  if (empty($_POST['username'])) {
    $errors[] = 'You forgot to enter your username.';
  } else {
    $un = $_POST['username'];
  }

  // Check for password:
  if (empty($_POST['password'])) {
    $errors[] = 'You forgot to enter your password.';
  } else {
    $pass = $_POST['password'];
  }



  if (empty($errors)) { // If everything's OK.

    $q = "SELECT * FROM user WHERE username='$un' AND password='$pass'";
   

    // Check the result:
    if ($result=mysqli_query($conn,$q)) { 

      // If record exists then create a username session
      $_SESSION['username'] = $un;
      
      header("Location: index.php");

    }else{//Notamatch!

      $errors[] = 'The username and password entered do not match those on file.';
    }

  } // End IF
 

  if($errors){

    echo '<h1>Error!</h1>
    <p class="error">The following error(s) occurred:<br>';
    foreach ($errors as $msg) { // Print each error.
      echo " - $msg<br>\n";
    }
    echo '</p><p>Please try again.</p><p><br></p>';

  }
    // // Return false and the errors:
    // return array(false, $errors);
    mysqli_close($conn);
    
}
?>


<body class="text-center">

	<!-- inlclude nav -->
	<?php require_once('layouts/nav.php'); ?>

    <form class="form-signin login-form" method="post" action="login.php">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" rautofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" >
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
        <p>Not a member?</p> <a href ="register.php">Sign Up Now!</a>
        <hr>
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