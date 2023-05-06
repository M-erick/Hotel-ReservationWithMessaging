<?php 
include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from tour_packages where package_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../image/tours/$img");

if(mysqli_query($con,"delete from tour_packages where package_id='$id' "))
{
header('location:dashboard.php?option=package');	
}

?>