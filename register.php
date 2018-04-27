<?php
	
	// $conn is used for db connection
	require('dbconnection.php');
  session_start(); //starts seesion for username this needs to be at the top of every page.
	$page_title = 'Login Page';
	require_once('layouts/head.php');

  if(isset($_SESSION['username'])){

    // primitive handling of log in check for sake of time.
    echo 'you are already logged in';
    

  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = array(); // Initialize an error array.

    // Check for a username:
    if (empty($_POST['username'])) {
      $errors[] = 'You forgot to enter your username.';
    } 
    else {
      $un = mysqli_real_escape_string($conn, trim($_POST['username']));
    }

  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Your password did not match the confirmed password.';
    } 
    else {
      $pass = mysqli_real_escape_string($conn, trim($_POST['pass1']));
    }
  }
  else {
    $errors[] = 'You forgot to enter your password.';
  }


  if (empty($errors)) { // If everything's OK.

        // Make the query:
    $q = "INSERT INTO user (username, password) VALUES ('$un', '$pass')";
    $r = @mysqli_query ($conn, $q); // Run the query.
   

    // Check the result:
    if ($r) { // If it ran OK start user session and redirect to index.

      $_SESSION['username'] = $un;

      header("Location: index.php");

    } else { // If it did not run OK.

      // Public message:
      echo '<h1>System Error</h1>
      <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

      // Debugging message:
      echo '<p>' . mysqli_error($conn) . '<br><br>Query: ' . $q . '</p>';
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
    
    mysqli_close($conn);
    
}
?>


<body class="text-center">

	<!-- inlclude nav -->
	<?php require_once('layouts/nav.php'); ?>

    <form class="form-signin login-form" method="post" action="register.php">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" rautofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass1" >
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input id="pass2" type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass2" >
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
        <p>Already a member?</p> <a href ="register.php">Login!</a>
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