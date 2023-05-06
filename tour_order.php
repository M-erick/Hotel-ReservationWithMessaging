<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E &M Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid"><!--Primary Id-->
  <h1 class="text-center text-primary">[ Tours Booking Details ]</h1><br>
  <div class="container">
    <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
               <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Package</th>
                  
                    
                    <th>Status</th>

                    <th>Receipt</th>

					<th>Cancel</th>
               </tr>

               <?php 
$sql= mysqli_query($con,"select * from package_booking_details where email='$eid' "); 
// uncomment above code and comment the while loop incase it fails
while($result=mysqli_fetch_assoc($sql))
{
$oid=$result['id'];
echo "<tr>";
echo "<td>".$result['name']."</td>";
echo "<td>".$result['email']."</td>";
echo "<td>".$result['phone']."</td>";
echo "<td>".$result['address']."</td>";
echo "<td>".$result['city']."</td>";
echo "<td>".$result['package']."</td>";
echo "<td style='background-color: green; border-radius: 10px; background-clip: text; -webkit-background-clip: text; color: transparent;'>".$result['status']."</td>";

if ($result['status']=== 'booked') {
  echo "<td><a href='generate_receipt.php?torder_id=$oid' style='color:Red'>Receipt</a></td>";
} else {
  echo "<td style='color:gray'>Receipt</td>";
 
}
echo "<td><a href='tour_cancel_order.php?torder_id=$oid' style='color:Red'>Cancel</a></td>";
echo "</tr>";
}                         
               ?> 
          </table>

    </div>
    </div>
  </div>
<?php
include('Footer.php')
?>
</body>
</html>
