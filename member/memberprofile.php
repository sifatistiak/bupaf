<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:http://bupaf.com/login');
}
else{
  $postid=intval($_SESSION['login']);

// For adding Member
if(isset($_POST['submit']))
{
$membername=$_POST['membername'];
$memberemail=$_POST['memberemail'];
$phone=$_POST['phone'];
$memberdept=$_POST['memberdept'];
// $memberdeptroll=$_POST['memberdeptroll'];
$memberbatch=$_POST['memberbatch'];
$memberdesignation=$_POST['memberdesignation'];
$commitee_year=$_POST['commitee_year'];
$current_position=$_POST['current_position'];
$fb_link=$_POST['fb_link'];
$li_link=$_POST['li_link'];
$password=$_POST['password'];
$status = $_POST['status'];
if ($_FILES['memberimage']['size'] == 0) {
$imgnewfile = $_POST['image_url'];
}
else {
$imgfile=$_FILES["memberimage"]["name"];
// get the image extension
// $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
$extension = pathinfo($imgfile, PATHINFO_EXTENSION);
// allowed extensions
$allowed_extensions = array("jpg","jpeg", "png");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions) )
{
echo "<script>alert('Invalid format. Only jpg /jpeg/ png format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=uniqid($membername).'.png';
// Code for move image into directory
move_uploaded_file($_FILES["memberimage"]["tmp_name"],"../assets/img/member/".$imgnewfile);
}
}




$sql = "UPDATE members SET name ='$membername' , email = '$memberemail', department = '$memberdept',phone ='$phone' , facebook_link = '$fb_link', linkedin_link = '$li_link', batch ='$memberbatch' , designation = '$memberdesignation', commitee_year = '$commitee_year', status = '$status', current_position = '$current_position', password = '$password', image = '$imgnewfile' WHERE members.id = '$postid' ";
$query=mysqli_query($con,$sql);
if($query)
{
$msg="Your Profile Successfully Updated ";
}
else{
$error="Something went wrong . Please try again.";
}

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>BUPAF | Member Profile</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
<style media="screen">
  .container{
    color: white;
    background-color: transparent;
  }
</style>

    </head>


    <body>

        <!-- Begin page -->
        <div >

            <!-- Top Bar Start -->

            <!-- ========== Left Sidebar Start ========== -->
             <?php include('../include/header.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="container" >
                <!-- Start content -->
                <div style="padding-top:8%;">
                    <div>


                        <div class="row">
							<div class="col-xs-12">
                                    <h4 style="margin-left: 15px;">Member Profile</h4>

							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">
<!---Success Message--->
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>
<?php
$postid=intval($_SESSION['login']);
$query=mysqli_query($con,"SELECT * FROM members WHERE members.id = '$postid'");
while($row=mysqli_fetch_array($query))
{

?>

                        <div class="row" style="margin-left: 20%;margin-right: 20%;">
                            <div class="col-md-12 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Name</label>
<input type="text" class="form-control" id="membername" name="membername" value="<?php echo htmlentities($row['name']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Email</label>
<input type="text" class="form-control" id="memberemail" name="memberemail" value="<?php echo htmlentities($row['email']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Phone</label>
<input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlentities($row['phone']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Department</label>
<input type="text" class="form-control" id="memberdept" name="memberdept" value="<?php echo htmlentities($row['department']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Batch</label>
<input type="text" class="form-control" id="memberbatch" name="memberbatch" value="<?php echo htmlentities($row['batch']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Roll</label>
<input type="text" class="form-control" id="memberdeptroll" name="memberdeptroll" value="<?php echo htmlentities($row['department_roll']);?>" readonly required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Member Designation</label>
<input type="text" class="form-control" id="memberdesignation" name="memberdesignation" value="<?php echo htmlentities($row['designation']);?>" readonly required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Commitee Year</label>
<input type="text" class="form-control" id="commitee_year" name="commitee_year" value="<?php echo htmlentities($row['commitee_year']);?>" required>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Current Position</label>
<input type="text" class="form-control" id="current_position" name="current_position" value="<?php echo htmlentities($row['current_position']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Status</label>
<select class="form-control" id="status" name="status" required>
  <option value="1" <?php if($row['status']=="1") echo 'selected="selected"';?>>Member</option>
  <option value="2" <?php if($row['status']=="2") echo 'selected="selected"';?>>Alumni</option>
</select>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Facebook Link</label>
<input type="url" class="form-control" id="fb_link" name="fb_link" value="<?php echo htmlentities($row['facebook_link']);?>">
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">LinkedIn Link</label>
<input type="url" class="form-control" id="li_link" name="li_link" value="<?php echo htmlentities($row['linkedin_link']);?>">
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Change Password</label>
<input type="password" class="form-control" id="password" name="password" value="<?php echo htmlentities($row['password']);?>">
</div>

<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Profile Image</b></h4>
<img src="http://bupaf.com/assets/img/member/<?=$row['image']?>" alt="" style="width:10%">
<input type="file" class="form-control" id="memberimage" name="memberimage">
</div>
</div>
</div>
<input type="hidden" name="image_url" value="<?php echo htmlentities($row['image']);?>">

<br><br>
<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Update</button>
 <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
 <br><br><br>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>

                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-12">
                            <center>

                              <br>
                              <div class="col-md-12"><img src="../assets/img/logo.png" width="15%"></div>
                            </center>
                            <hr class="footer col-md-12">
                            <center>
                              <p>© 2019 All Rights Reserved | Developed by <a href="https://skoder.co">Skoder</a></p>
                            </center>
                          </div>
                        </div>
<?php } ?>


                    </div> <!-- container -->

                </div> <!-- content -->


            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        <!-- END wrapper -->



      </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../admin/assets/js/jquery.min.js"></script>
        <script src="../admin/assets/js/bootstrap.min.js"></script>
        <script src="../admin/assets/js/detect.js"></script>
        <script src="../admin/assets/js/fastclick.js"></script>
        <script src="../admin/assets/js/jquery.blockUI.js"></script>
        <script src="../admin/assets/js/waves.js"></script>
        <script src="../admin/assets/js/jquery.slimscroll.js"></script>
        <script src="../admin/assets/js/jquery.scrollTo.min.js"></script>



        <!-- page specific js -->
        <script src="../admin/assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="../admin/assets/js/jquery.core.js"></script>
        <script src="../admin/assets/js/jquery.app.js"></script>







    </body>
</html>
<?php } ?>
