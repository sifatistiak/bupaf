<?php
session_start();

 ?>
 <style media="screen">
 <style>
.dropbtn {
background-color: transparent;
color: transparent;
padding: 16px;
border: none;
}

.dropdown {
position: relative;
/* display: inline-block; */
}

.dropdown-content {
display: none;
position: absolute;
background-color: transparent;
min-width: 20px;
/* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
z-index: 1;
}

.dropdown-content a {
color: white;
padding-top: 3px;
text-decoration: none;
display: block;
}

.dropdown-content a:hover {background-color: gold; color: black;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: transparent;}
</style>
 </style>
    <div class="container fixed-top">

        <nav class="navbar navbar-dark navbar-expand-md text-uppercase" style="height: 60px;">
          <div class="container-fluid">
              <a class="navbar-brand" href="http://bupaf.com/" style="width: 20%;margin-left: 10%;">
              <img src="http://bupaf.com/assets/img/logo.png" width="100%" style="padding: -8px;margin-left: -61%;width: 137px;padding-bottom: -11px;padding-left: 1px;">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse sticky-top" style="background:#2b2b2b; font-family: 'Montserrat';" id="navcol-1">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/news">NEWS</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/blog">BLOGS</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/event">EVENT</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/alumni">ALUMNI</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/publication">PUBLICATION</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="http://bupaf.com/member">MEMBERS</a></li>
                    </ul>
                    <?php
                    if (empty($_SESSION['login']) && empty($_SESSION['login_img'])) {
                    echo '<a class="text-light login" href="http://bupaf.com/login" style="filter: brightness(153%);">SIGN IN</a>';
                    }
                    else {
                      ?>
                        <div class="dropdown">
                          <!-- <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                            <img class="btn dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" src="http://bupaf.com/assets/img/member/<?=$_SESSION['login_img']?>" alt="" style="width: 70px;height: 55px;border-radius: 50%;">
                          <!-- </button> -->
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="member/memberprofile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                          </div>
                        </div>
                      <?php
                    }
                    ?>
                    </div>
      </div>

</nav>
<hr class="header">
    </div>