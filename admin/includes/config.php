<?php
error_reporting(0);
ini_set('display_errors', 0);

define('DB_SERVER', 'localhost');
define('DB_USER', 'u514102991_bupaf');
define('DB_PASS', 'bupaf@CLUB2021');
define('DB_NAME', 'u514102991_bupaf');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
