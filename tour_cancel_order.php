<?php 
include('connection.php');
$oid=$_GET['torder_id'];
$q=mysqli_query($con,"delete from  package_booking_details where id='$oid' ");
if($q)
{
header('location:tour_order.php');
}
?>