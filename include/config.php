<?php
define('DB_SERVER','localhost');
define('DB_USER','skabustf_bupaf');
define('DB_PASS' ,'skoder@bupaf');
define('DB_NAME','skabustf_bupaf');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
