<?php
include('include/config.php');
session_start();
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <title>BUPAF</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/logo2.png" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body style="width:100%; height: 100%; margin: 0px; padding: 0px; overflow-x: hidden;">
  <div style="margin-left:12.5%;margin-right:12.5%;">

<div>
<?php
include('include/header.php');
 ?>
</div>
<!-- div class full body  -->
<div class="col-md-12" style="margin-top:0%;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="max-height: 80%; border-radius: 1px;">
    <div class="carousel-item active">
      <img class="d-block w-100 img-fluid" src="http://bupaf.club/assets/img/slider1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="http://bupaf.club/assets/img/slider2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="http://bupaf.club/assets/img/slider3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="http://bupaf.club/assets/img/slider4.jpg" alt="Forth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<h3 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat Bold'; font-size: 2em; font-weight: bold;">ABOUT US</h3>

<p style="color:white; margin-top: 3%; text-align: justify; font-family: 'Montserrat'; font-size: 15px;">
  <?php
  $query=mysqli_query($con,"SELECT aboutus FROM aboutus WHERE id = 1");
  $rowcount=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  if($rowcount>0)
  {

      $text = htmlspecialchars_decode($row['aboutus']);
      echo $text;
  }
  ?>
<br><br><br>
  To get in touch, <a href="#contact_us" style="color:#D1B055;">contact us.</a>
</p>

<h3 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat Bold'; font-size: 2em; font-weight: bold;" onclick="location.href = './event';">EVENTS</h3>
<div class="row">


  <div class="col-md-4">
    <a href="event/" style="text-decoration: none;">
    <img class="rounded" style="max-width:100%; max-height:100%;" src="assets/img/bupafcover.png" alt="">
    <h6 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat'; font-weight: bold;">National Accounting Olympiad</h6>
    <p style="color:white; margin-top: 3%; text-align: justify; font-family: 'Montserrat'; font-size: 0.8em;">
      The name of the organization
        shall be “Bangladesh university of professionals accounting forum (BUPAF)” (hereinafter termed the “Forum”); also regarded as
        “BUP Accounting Forum”.
     </p>
   </a>
  </div>
  <div class="col-md-4">
    <img class="rounded" style="max-width:100%; max-height:100%;" src="assets/img/bupafcover.png" alt="">
    <h6 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat'; font-weight: bold;">Training Sessions</h6>
    <p style="color:white; margin-top: 3%; text-align: justify; font-family: 'Montserrat'; font-size: 0.8em;">
      The name of the organization
        shall be “Bangladesh university of professionals accounting forum (BUPAF)” (hereinafter termed the “Forum”); also regarded as
        “BUP Accounting Forum”.
     </p>
  </div>
  <div class="col-md-4">
    <img class="rounded" style="max-width:100%; max-height:100%;" src="assets/img/bupafcover.png" alt="">
    <h6 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat';  font-weight: bold;">Seminers</h6>
    <p style="color:white; margin-top: 3%; text-align: justify; font-family: 'Montserrat'; font-size: 0.8em;">
      The name of the organization
        shall be “Bangladesh university of professionals accounting forum (BUPAF)” (hereinafter termed the “Forum”); also regarded as
        “BUP Accounting Forum”.
     </p>
  </div>

</div>

<h3 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat Bold'; font-size: 2em; font-weight: bold;">SPONSORS & PARTNERS</h3>
<div id="content" class="row" style="text-transform: uppercase; display: flex;
  flex-wrap: nowrap;
  overflow-x: hidden;">
  <?php
  $query1=mysqli_query($con,"SELECT * FROM sponsor ORDER BY priority ASC, id DESC");

  while($row1=mysqli_fetch_assoc($query1))
  {
  ?>
  <div class="col-md-2">
    <img class="rounded" src="assets/img/sponsor/<?=$row1['image']?>" alt="" style="max-width:100%; max-height:100%;">
    <h6 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat';"><?=$row1['title']?></h6>
  </div>
 <?php
    }
  ?>
</div>
<div class="row float-right" style="margin-right: 2px;
    background-color: transparent;">
  <button style="background-color: transparent;border: 1px solid #c8bf09d9;color: gold; outline:none;" id="slideLeft" type="button"><</button>
  <button style="background-color: transparent;border: 1px solid #c8bf09d9;color: gold; outline:none;" id="slideRight" type="button">></button>
</div>

<h3 style="color:#D1B055; margin-top: 5%; font-family: 'Montserrat Bold'; font-size: 2em; font-weight: bold;">CONTACT US</h3>
<div class="row" id="contact_us" style="margin-top:2%">
  <div class="col-md-4">
    <p style="color:white; text-align: left; font-family: 'Montserrat'; font-size: 0.8em;">
      Email : <a href="mailto:bupafofficial@gmail.com" target="_top" style="color:white">bupafofficial@gmail.com</a>
      <br><br>
      Like us on facebook: fb.com/bupafofficial
      <br>Follow us on Instagram: ig.com/bupafofficial
      <br>
    </p>
<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fbupafofficial&width=160&layout=button_count&action=like&size=large&share=true&height=46&appId" width="160" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
<br>
<script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/FollowCompany" data-id="30902436" data-counter="right"></script>
   </div>

  <div class="col-md-4">
    <p style="color:white; text-align: left; font-family: 'Montserrat'; font-size: 0.8em;">
      Address :
      <br><br>
      Department of Accounting & Information Systems, Bangladesh University of Professionals, Mirpur Cantonment, Dhaka
    </p>
  </div>

  <div class="col-md-4">
    <div class="mapouter">
      <div class="gmap_canvas">
        <iframe width="307" height="175" id="gmap_canvas" src="https://maps.google.com/maps?q=BUP&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <style>
        .mapouter{position:relative;text-align:right;height:175px;width:307px;}
        .gmap_canvas {overflow:hidden;background:none!important;height:175px;width:307px;}
      </style>
      </div>
  </div>


</div>


</div><!-- div class full body  -->

<div class="row">
  <div class="col-md-12">

  <center>
    <br>
  <div class="col-md-12"><img src="assets/img/logo.png" width="15%"></div>
</center>
<hr class="footer col-md-12">
<center>
<p>© 2019 - 2021 All Rights Reserved | Developed by <a href="https://skoder.co">Skoder</a></p>
</center>
</div>
</div>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="https://www.stadget.com/cdn/widget-init.min.js"></script> -->
<script type="text/javascript">
const buttonRight = document.getElementById('slideRight');
const buttonLeft = document.getElementById('slideLeft');

buttonRight.onclick = function () {
document.getElementById('content').scrollLeft += 90;
};
buttonLeft.onclick = function () {
document.getElementById('content').scrollLeft -= 90;
};
</script>
</body>

</html>
