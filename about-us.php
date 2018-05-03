<!-- include head -->
<?php 
session_start(); //starts seesion for username this needs to be at the top of every page.
$page_title = 'Bald Eagle Shopping Center';
require_once('layouts/head.php');
?>
  <body>
   <!-- include nav -->
   <?php 
      require_once('layouts/nav.php');
   ?>

    <main role="main">
    <div class="container">
    <h2>Team 3</h2>
    <p>We are students of Northeastern Illinois university, majoring in Computer Science. All 3 of us are very
    good in java programing and some of us are knowledgeable in creating a functional website. We have
    very optimistic planning for our further education. We may or may not do masters, but currently all 3 of
    us are pursuing a bachelors.</p>

    <p>This webpage is just the beginning of our bright future.</p>

    <p>Please contact us through email at:</p>
    <ul>
      <li><a href="mailto:B-Sarac@neiu.edu" title="Contact Joseph Rodriguez">Baris Sarac</a></li>    
      <li><a href="mailto:J-Rodriguez100@neiu.edu" title="Contact Joseph Rodriguez">Joseph Rodriguez</a></li>    
      <li><a href="mailto:R-Shethwala@neiu.edu" title="Contact Joseph Rodriguez">Rushda Shethwala</a></li>    
    </ul>  
    </div>                                              
    </main>
    <!-- include footer -->
      <?php 
        require_once('layouts/footer.php');
        require_once('layouts/scripts.php');
      ?>
  </body>
</html>
