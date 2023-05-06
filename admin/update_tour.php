<?php 
include('../connection.php');
$oid=$_GET['booking_id'];
$booked = 'booked';
$q=mysqli_query($con,"update  package_booking_details set  status = '$booked' where id='$oid' ");
if($q)
{
header('location:dashboard.php?option=tours');
}
?>