<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{


if($_GET['action']=='del')
{
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"DELETE FROM members where members.id='$postid'");
if($query)
{
$msg="Member Information deleted ";
}
else{
$error="Something went wrong . Please try again.";
}

}
if($_GET['task']=='alumni')
{
$memid=intval($_GET['aid']);
$query=mysqli_query($con,"UPDATE `members` SET `status` = '2' WHERE `members`.`id` = '$memid'");
if($query)
{
$msg="Alumni Added";
}
else{
$error="Something went wrong . Please try again.";
}
}
if($_GET['task']=='member')
{
$memid=intval($_GET['aid']);
$query=mysqli_query($con,"UPDATE `members` SET `status` = '1' WHERE `members`.`id` = '$memid'");
if($query)
{
$msg="Member Added";
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
        <title>BUPAF | Manage Member</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>


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
                                    <h4 class="page-title">Manage Member </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Member/Alumni</a>
                                        </li>
                                        <li class="active">
                                            Manage
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>

<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Batch</th>
<th>Designation</th>
<th>Commitee Year</th>
<th>Current Postion</th>
<th>Profile Image</th>
<th>Make Alumni</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"SELECT * FROM members where status ='1' ORDER BY id DESC ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="10" align="center"><h3 style="color:red">No record found</h3></td>
<tr>
<?php
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['name']);?></b></td>
<td><?php echo htmlentities($row['email'])?></td>
<td><?php echo htmlentities($row['department'])?></td>
<td><b><?php echo htmlentities($row['batch']);?></b></td>
<td><?php echo htmlentities($row['designation'])?></td>
<td><?php echo htmlentities($row['commitee_year'])?></td>
<td><b><?php echo htmlentities($row['current_position']);?></b></td>
<td><?php echo '<img width ="100px" height = "70px" src="../assets/img/member/'.$row['image'].'" alt="Not Found" onerror=this.src="../assets/img/member/1.png">';?></td>
<td><a href="manage-member.php?aid=<?php echo htmlentities($row['id']);?>&&task=alumni" onclick="return confirm('Do you want to make this Member a Alumni?')"><button type="button" class="btn btn-warning"> <i class="fa fa-check" aria-hidden="true" style="color: GREEN"></i></button></a> </td>


<td><a href="edit-member.php?pid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
    &nbsp;<a href="manage-member.php?pid=<?php echo htmlentities($row['id']);?>&&action=del" onclick="return confirm('Do you really want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
 </tr>
<?php } }?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
<br>
  <h4 class="page-title">Manage Alumni </h4>
  <br><br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>

<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Batch</th>
<th>Designation</th>
<th>Commitee Year</th>
<th>Current Postion</th>
<th>Profile Image</th>
<th>Make Member</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"SELECT * FROM members where status ='2' ORDER BY id DESC ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="10" align="center"><h3 style="color:red">No record found</h3></td>
<tr>
<?php
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['name']);?></b></td>
<td><?php echo htmlentities($row['email'])?></td>
<td><?php echo htmlentities($row['department'])?></td>
<td><b><?php echo htmlentities($row['batch']);?></b></td>
<td><?php echo htmlentities($row['designation'])?></td>
<td><?php echo htmlentities($row['commitee_year'])?></td>
<td><b><?php echo htmlentities($row['current_position']);?></b></td>
<td><?php echo '<img width ="100px" height = "70px" src="../assets/img/member/'.$row['image'].'" alt="Not Found" onerror=this.src="../assets/img/member/1.png">';?></td>
<td><a href="manage-member.php?aid=<?php echo htmlentities($row['id']);?>&&task=member" onclick="return confirm('Do you want to make this Alumni a Member?')"><button type="button" class="btn btn-warning"> <i class="fa fa-check" aria-hidden="true" style="color: Red"></i></button></a> </td>


<td><a href="edit-member.php?pid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
    &nbsp;<a href="manage-member.php?pid=<?php echo htmlentities($row['id']);?>&&action=del" onclick="return confirm('Do you really want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
 </tr>
<?php } }?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
		<script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>
