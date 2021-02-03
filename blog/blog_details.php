<?php
include '../include/config.php';
if (isset($_GET['blog_id'])) {
  $blog_id = $_GET['blog_id'];
?>
  <html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
      <title>BUPAF</title>
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
      <link rel="stylesheet" href="../assets/css/styles.css">
      <link rel="shortcut icon" href="../assets/img/logo2.png" type="image/png">
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  </head>

  <body style="width:100%; height: 100%; margin: 0px; padding: 0px; overflow-x: hidden;">
    <div style="margin-left:12.5%;margin-right:12.5%;">

      <div>
      <?php
      include('../include/header.php');
       ?>
      </div>
  <!-- div class full body  -->
  <div class="col-md-12" style="margin-top:8%;">

    <h3 style="width: 30%; color:#D1B055; font-family: 'Montserrat Bold';">BLOG DETAILS</h3>

  <?php
  $query  = "select * from `blog` where id = $blog_id";
  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_object($result)) {
      // echo '<div class="row" style=" font-size: 14px; color: white; margin-top:3%; background-color:rgb(0,0,0); opacity:0.5;">';
      echo '<div class="col-md-12 text-center">';
      echo '<img class="col-md-4 w-70 rounded img-fluid text-center"  src="../assets/img/blog/'.$row->image.'" alt="Not Found" onerror=this.src="../assets/img/blog/noimg.png">';
      echo '</div>';
      echo '<div class="col-md-12" style="margin-top:2rem;">';
      echo '<h6 style="color:#D1B055;">'.$row->title.'</h6>';
      echo '<p style="text-align: justify;">'.$row->details.'</p>';
      echo '<br>';
      echo '<p style="text-align: left;">Tags : '.$row->tags.'</p>';
      echo '</div>';
      // echo '</div>';
      echo '<div style="float:right; margin-top:3%">';

        }
  }
  ?>

  </div><!-- div class full body  -->

  <div class="row">
    <div class="col-md-12">

    <center>
    <div style="width: 162px;"><img src="../assets/img/logo.png"  style="height: 40%;width: 100%; margin-top: 14px;"></div>
  </center>
  <hr class="footer">
  <center>
  <p>© 2019 All Rights Reserved | Developed by <a href="https://skoder.co">Skoder</a></p>
  </center>
  </div>
  </div>

  </div>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="https://www.stadget.com/cdn/widget-init.min.js"></script> -->
  </body>

  </html>

  <?php
}

?>
