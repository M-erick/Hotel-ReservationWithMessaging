<?php 
include('../connection.php');
$oid=$_GET['booking_id'];
$q=mysqli_query($con,"delete from  package_booking_details where id='$oid' ");
if($q)
{
header('location:dashboard.php?option=tours');
}
?>