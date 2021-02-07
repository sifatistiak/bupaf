<?php
session_start();
include('../include/config.php');
 if (isset($_POST['submit'])) {
	 $uname = $_POST['username'];
	 $pass = $_POST['pass'];
	 $query=mysqli_query($con,"SELECT * FROM members where department_roll = '$uname' and password = '$pass' ");
	 $rowcount=mysqli_num_rows($query);
	 $row=mysqli_fetch_array($query);
	 if($rowcount==1){
		 $_SESSION['login'] = $row['id'];
		 $_SESSION['login_img'] = $row['image'];
		 header("location: http://bupaf.club/");
	 }else {
		 echo "<script>alert('Wrong Credentials');</script>";
	 }


 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BUPAF</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<!--===============================================================================================-->\
<style media="screen">
	.inputmy{
		font-family: 'Montserrat', sans-serif;
		font-size: 15px;
		line-height: 1.2;
		position: relative;
		display: block;
		width: 100%;
		height: 55px;
		border-radius: 5px;
    background: black;
    border: groove;
    border-color: #d1b055;
    color: white;
		padding: 0 35px 0 35px;
	}
	input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: white;
  opacity: 1; /* Firefox */
}

input:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: white;
}

input::-ms-input-placeholder { /* Microsoft Edge */
 color: white;
}
</style>
</head>
<body style="width:100%; height: 100%; margin: 0px; padding: 0px; overflow-x: hidden;">
  <div style="margin-left:12.5%;margin-right:12.5%;">

<div>
	<?php
	include('../include/header.php');
	 ?>
</div>

	<div class="limiter">
		<div class="container-login100 "style="min-height: 50vh;" >
			<div class="wrap-login100" style="width: 650px;">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-110" method="post" >
					<span class="login100-form-title" style="background-color:black; color: #d1b055; padding-left: 55px; text-align: left; font-weight: bold;">
						Sign In
					</span>

					<div class="validate-input m-b-16" data-validate="Please enter ID / Roll">
						<input class="inputmy" type="text" name="username" placeholder="ID / ROLL">
						<!-- <span class="focus-input100"></span> -->
					</div>

					<div class="validate-input" data-validate = "Please enter password">
						<input class="inputmy" type="password" name="pass" placeholder="PASSWORD">
						<!-- <span class="focus-input100"></span> -->
					</div>
					<br><br>

					<!-- <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div> -->

					<div class="">
						<button type="submit" name="submit" class="login100-form-btn" style="border-radius: 10px;width: 180px;margin:auto; font-weight: bolder;font-size: 18px;color: black;">
							Sign in
						</button>
					</div>
					<br>

					<!-- <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="#" class="txt3">
							Sign up now
						</a>
					</div> -->
				</form>
			</div>
		</div>
		<img src="../assets/img/logo.png" alt="not" style="width:20%;margin-left: 42%;">
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
