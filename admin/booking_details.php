<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<table class="table table-bordered table-striped table-hover">
	<h1>Room Booking Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>Room Type</th>
		<th>Check in Date</th>
		<th>Check Out Time</th>
		<th>Check Out Date</th>
		<th>Occupancy</th>
		<th>Status</th>
		<th>Update Status</th>

		<th>Cancel Order</th>
	</tr>

<?php 
$i=1;
$sql=mysqli_query($con,"select * from room_booking_details");
while($res=mysqli_fetch_assoc($sql))
{
$oid=$res['id'];

?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['phone']; ?></td>
		<td><?php echo $res['address']; ?></td>
		<td><?php echo $res['room_type']; ?></td>
		<td><?php echo $res['check_in_date']; ?></td>
		<td><?php echo $res['check_in_time']; ?></td>
		<td><?php echo $res['check_out_date']; ?></td>
		<td><?php echo $res['Occupancy']; ?></td>
		<td><?php echo $res['status']; ?></td>

		<td><a style="color:green" href="update_order.php?booking_id=<?php echo $oid; ?>">Update</a></td>

		<td><a style="color:red" href="cancel_order.php?booking_id=<?php echo $oid; ?>">Cancel</a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>
<form method="post" action="generate_booking_pdf.php">
    <button type="submit" name="download_pdf" class="btn btn-primary">
        <i class="fas fa-download"></i> Download PDF
    </button>
   
</form>

