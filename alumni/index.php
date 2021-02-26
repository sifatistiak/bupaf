<?php session_start(); ?>
<?php header('Access-Control-Allow-Origin: *'); ?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
  <title>BUPAF | Alumni</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="./css/styles_member.css">
  <link rel="stylesheet" href="./css/Team-with-rotating-cards.css">
  <link rel="shortcut icon" href="../assets/img/logo2.png" type="image/png">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <style>
    .card-container-imagia,
    .front-imagia,
    .back-imagia {
      background-color: #121212
    }
  </style>

</head>

<body style="width:100%; height: 100%; margin: 0px; padding: 0px; overflow-x: hidden;">
  <div style="margin-left:12.5%;margin-right:12.5%;">

    <div>
      <!-- <div class="container fixed-top">

        <nav class="navbar navbar-dark navbar-expand-md text-uppercase" style="height: 60px;">
          <div class="container-fluid">
              <a class="navbar-brand" href="../" style="width: 20%;margin-left: 10%;">
              <img src="../assets/img/logo.png" width="100%" style="padding: -8px;margin-left: -61%;width: 137px;padding-bottom: -11px;padding-left: 1px;">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse sticky-top" style="background:#2b2b2b" id="navcol-1">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../news">NEWS</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../blog">BLOGS</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../event">EVENT</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../alumni">ALUMNI</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../publication">PUBLICATION</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="../member">MEMBERS</a></li>
                    </ul><a class="text-light login" href="../login" style="filter: brightness(153%);">SIGN IN</a></div>
      </div>

</nav>
<hr class="header">
    </div> -->
      <?php
      include("../include/header.php");
      ?>
    </div>
    <!-- div class full body  -->
    <div class="col-md-12" style="margin-top:8%;">

      <h3 style="width: 20%; color:#D1B055; font-family: 'Montserrat Bold'; font-size: 2em; font-weight: bold;">ALUMNI</h3>
      <input type="text" id="search" name="" placeholder="Search Member Name / Batch" onkeyup="searchMember()" style="
    width: 100%; border: 1px solid #c2ab08e0;  border-radius: 10px; background-color: transparent;  color: white;
    height: 40px;  background-image: url('search.png');  background-position: 9px 12px;  background-repeat: no-repeat;
    padding-left: 30px; outline: none;">


    </div>

    <?php
    // include 'member_page.php';
    ?>

    <!-- <div class="container-fluid mtb-margin-top"> -->
    <div class="row" style="margin: auto;">
      <!-- <div class="col-md-12"> -->
      <?php
      include '../include/config.php';
      $limit = 9;
      /*How may adjacent page links should be shown on each side of the current page link.*/
      $adjacents = 2;
      // $sql = "SELECT COUNT(*) 'total_rows' FROM `members` where status = '1'";
      $sql = "SELECT COUNT(*) 'total_rows' FROM `members`";
      $res = mysqli_fetch_object(mysqli_query($con, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);


      if (isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page - 1);
      } else {
        $page = 1;
        $offset = 0;
      }
      //

      // $query  = "select * from `members` where status = '1' limit $offset, $limit";
      $query  = "select * from `members` where NOT status = '1' order by `commitee_year` limit $offset, $limit";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) { ?>

          <div class="col-sm-6 col-md-3 col-lg-4 full-card member">
            <!-- Start: card container -->
            <div class="card-container-imagia">
              <!-- Start: card -->
              <div class="card-imagia">
                <!-- Start: front -->
                <div class="front-imagia">
                  <!-- Start: cover image -->
                  <div class="cover-imagia"><img alt="" src="http://bupaf.club/assets/img/logo.png"></div>
                  <!-- End: cover image -->
                  <!-- Start: user image -->
                  <div class="user-imagia"><img class="img-circle" alt="Member_Image" src="../assets/img/member/<?= $row->image ?>"></div>
                  <!-- End: user image -->
                  <!-- Start: text -->
                  <div class="content-imagia">
                    <h3 class="name-imagia member_name" style="color:white;"><?= $row->name ?></h3>
                    <p class="subtitle-imagia" style="color:white;"><?= $row->designation ?><br></p>
                  </div>
                  <!-- End: text -->
                  <!-- Start: footer -->
                  <div class="footer-imagia"><span><?= $res = (($row->status) == 1) ? "Member" : "Alumni" ?></span></div>
                  <!-- End: footer -->
                </div>
                <!-- End: front -->
                <!-- Start: back -->
                <div class="back-imagia">
                  <!-- Start: content -->
                  <div class="content-imagia content-back-imagia">
                    <div>
                      <h3 class="text-center member_batch" style="color:white;"><?= $row->department . '-' . $row->batch ?></h3>
                      <p class="text-center" style="color:white;">Commitee Year <?= $row->commitee_year ?><br><?= $row->facebook_link ?></p>
                    </div>
                  </div>
                  <!-- End: content -->
                  <!-- Start: footer -->
                  <!-- End: footer -->
                </div>
                <!-- End: back -->
              </div>
              <!-- End: card -->
            </div>
            <!-- End: card container -->
          </div>
          <!-- echo '<div class="col-md-3 member" style="font-size: 14px; color: white; background-color:rgba(0, 0, 0, 0.2); border-radius:30px; margin:3%">';
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<img src="../assets/img/member/'.$row->image.'" class="rounded-circle img-fluid" alt="No img Found" style="margin-top: 25%; margin-botom:25%;"/>';
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<p class="member_name" style="color:#D1B055; font-weight: bold; text-align:left;">'.$row->name.' </p>';
            echo '<p class="member_batch" style="text-align:left;">'.$row->department.'-'.$row->batch.'</p>';
            echo '<p style="text-align:left;"><u>BUPAF Title</u>';
            echo '<br>'.$row->designation;
            echo '<br> Year of '.$row->commitee_year.'</p>';
            echo '<br> '.$res = (($row->status)==1)? "Member" : "Alumni".'</p>';
            echo '<p style="text-align:left;"><u>Current Position</u>';
            echo '<br>'.$row->current_position.'</p>';
            echo '</div>';
            echo '</div>';
            // echo '<div style="float:right; margin-top:3%">'; -->
      <?php
        }
      }


      //Here we generates the range of the page numbers which will display.
      if ($total_pages <= (1 + ($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if (($page - $adjacents) > 1) {
          if (($page + $adjacents) < $total_pages) {
            $start = ($page - $adjacents);
            $end   = ($page + $adjacents);
          } else {
            $start = ($total_pages - (1 + ($adjacents * 2)));
            $end   = $total_pages;
          }
        } else {
          $start = 1;
          $end   = (1 + ($adjacents * 2));
        }
      }

      //If you want to display all page links in the pagination then
      //uncomment the following two lines
      //and comment out the whole if condition just above it.
      /*$start = 1;
        $end = $total_pages;*/
      ?>

      <?php if ($total_pages > 1) { ?>

        <ul class="pagination pagination-sm justify-content-center">
          <!-- Link of the first page -->
          <li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=1'>
              <<< /a>
          </li>
          <!-- Link of the previous page -->
          <li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=<?php ($page > 1 ? print($page - 1) : print 1) ?>'>
              << /a>
          </li>
          <!-- Links of the pages with page number -->
          <?php for ($i = $start; $i <= $end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '') ?>'>
              <a class='page-link' href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <!-- Link of the next page -->
          <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=<?php ($page < $total_pages ? print($page + 1) : print $total_pages) ?>'>></a>
          </li>
          <!-- Link of the last page -->
          <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=<?php echo $total_pages; ?>'>>>
            </a>
          </li>
        </ul>

      <?php } ?>
      <?php mysqli_close($con); ?>


      <!-- </div> -->
      <!-- </div> -->
      <!-- </div> -->

      <!-- <div class="col-md-3" style=" font-size: 14px; color: white; background-color:rgba(0, 0, 0, 0.2); border-radius:30px; margin:3%">
    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/logo2.png" class="rounded-circle img-fluid" alt="" style="margin-top: 25%; margin-botom:25%;"/>
                        </div>
                        <div class="col-md-8">
                        <p style="color:#D1B055; font-weight: bold; text-align:left;">Name </p>
                        <p style="text-align:left;">Batch</p>
                        <p style="text-align:left;"><u>BUPAF Title</u></p>
                        <p style="text-align:left;"><u>Current Position</u></p>
                        </div>
      </div>
    </div> -->
      <!-- </div> -->

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
<script type="text/javascript">
  const searchMember = () => {
    var filter = document.getElementById('search').value.toUpperCase();
    var length = document.getElementsByClassName('member_name').length;
    for (var i = 0; i < length; i++) {
      var name = document.getElementsByClassName('member_name')[i].innerHTML;
      var batch = document.getElementsByClassName('member_batch')[i].innerHTML;
      if (name || batch) {
        if ((name.toUpperCase().indexOf(filter) > -1) || (batch.toUpperCase().indexOf(filter) > -1)) {
          document.getElementsByClassName('member')[i].style.display = "";
        } else {
          document.getElementsByClassName('member')[i].style.display = "none";

        }
      }

    }
  }
</script>

</html>