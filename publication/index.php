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

  <style>
    .card {
      background-color: black;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.1s;
      width: 100%;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
      padding: 2px 16px;
    }
  </style>
</head>

<body style="width:100%; height: 100%; margin: 0px; padding: 0px; overflow-x: hidden;">
  <div style="margin-left:12.5%;margin-right:12.5%;">

    <div>
      <?php
      include '../include/config.php';

      include('../include/header.php');
      ?>
    </div>
    <!-- div class full body  -->
    <div class="col-md-12" style="margin-top:8%;">

      <h3 style="width: 20%; color:#D1B055; font-family: 'Montserrat Bold';">Publications</h3>


      <!-- <div class="row text-center" style="margin-top:3%; position: relative; text-align: left; color: white;"> -->


      <!-- <img src="../assets/img/slider1.png" class="col-md-12" alt="Responsive image"> -->
      <!-- height:250px; style e add hbe -->
      <!-- <div style="position: absolute; bottom: 4%; background-color:rgba(128,128,128,0.5); margin-left:5%; width:90%; padding:2%">
          <h3>Publications</h3>
          Department of AIS inaugurates BUP Accounting Forum
        </div> -->
      <!-- </div> -->

      <div class="row" style="margin-top:1rem;">
        <?php
        $query = "select * from `publications` order by id desc ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_object($result)) {
        ?>
            <div class="col-md-4" style="padding: 1rem;">
              <div class="card">
                <div class="container">
                  <h4> <a style="color:white;" href="<?php echo $row->link; ?>"><?php echo $row->title;  ?></a> </h4>
                  <h6> <a style="color:lightblue;" href="<?php echo $row->link; ?>"><?php echo $row->link; ?></a> </h6>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>


    </div><!-- div class full body  -->

    <div class="row">
      <div class="col-md-12">

        <center>
          <div><img src="../assets/img/logo.png" style="width: 10%; margin-top: 14px;"></div>
        </center>
        <hr class="footer">
        <center>
          <p>© 2019 - 2021 All Rights Reserved | Developed by <a href="https://skoder.co">Skoder</a></p>
        </center>
      </div>
    </div>

  </div>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="https://www.stadget.com/cdn/widget-init.min.js"></script> -->
</body>

</html>