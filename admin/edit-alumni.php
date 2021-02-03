<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{
  $postid=intval($_GET['pid']);

// For adding Alumni
if(isset($_POST['submit']))
{
$membername=$_POST['membername'];
$memberemail=$_POST['memberemail'];
$memberdept=$_POST['memberdept'];
$memberbatch=$_POST['memberbatch'];
$memberdesignation=$_POST['memberdesignation'];
$commitee_year=$_POST['commitee_year'];
$current_position=$_POST['current_position'];
$imgfile=$_FILES["memberimage"]["name"];
// get the image extension
// $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
$extension = pathinfo($imgfile, PATHINFO_EXTENSION);
// allowed extensions
$allowed_extensions = array("jpg","jpeg", "png");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg /jpeg/ png format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=uniqid($membername).'.png';
// Code for move image into directory
move_uploaded_file($_FILES["memberimage"]["tmp_name"],"../assets/img/member/".$imgnewfile);

$status=1;
$sql = "UPDATE members SET name ='$membername' , email = '$memberemail', department = '$memberdept', batch ='$memberbatch' , designation = '$memberdesignation', commitee_year = '$commitee_year', current_position = '$current_position', image = '$imgnewfile' WHERE members.id = '$postid' ";
$query=mysqli_query($con,$sql);
if($query)
{
$msg="Alumni successfully Edited ";
}
else{
$error="Something went wrong . Please try again.";
}

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
        <title>BUPAF | Edit Alumni</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Edit Alumni </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Alumni</a>
                                        </li>
                                        <li>
                                            <a href="#">Edit Alumni </a>
                                        </li>
                                        <li class="active">
                                            Edit Alumni
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
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
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"SELECT * FROM members WHERE members.id = '$postid'");
while($row=mysqli_fetch_array($query))
{

?>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Alumni Name</label>
<input type="text" class="form-control" id="membername" name="membername" value="<?php echo htmlentities($row['name']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Alumni Email</label>
<input type="text" class="form-control" id="memberemail" name="memberemail" value="<?php echo htmlentities($row['email']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Alumni Department</label>
<input type="text" class="form-control" id="memberdept" name="memberdept" value="<?php echo htmlentities($row['department']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Alumni Batch</label>
<input type="text" class="form-control" id="memberbatch" name="memberbatch" value="<?php echo htmlentities($row['batch']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Alumni Designation</label>
<input type="text" class="form-control" id="memberdesignation" name="memberdesignation" value="<?php echo htmlentities($row['designation']);?>" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Commitee Year</label>
<input type="text" class="form-control" id="commitee_year" name="commitee_year" value="<?php echo htmlentities($row['commitee_year']);?>" required>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Current Position</label>
<input type="text" class="form-control" id="current_position" name="current_position" value="<?php echo htmlentities($row['current_position']);?>" required>
</div>


<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Profile Image</b></h4>
<input type="file" class="form-control" id="memberimage" name="memberimage"  required>
</div>
</div>
</div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Edit Alumni</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
<?php } ?>


                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>



        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>







    </body>
</html>
<?php } ?>
