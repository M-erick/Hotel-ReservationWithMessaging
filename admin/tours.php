<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<table class="table table-bordered table-striped table-hover">
	<h1>Package Booking Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>City</th>
		<th>Package</th>
		<th>Status</th>
		<th>Serial number</th>

		<th>Update Status</th>

		<th>Cancel Order</th>
	</tr>

<?php 
$i=1;
$sql=mysqli_query($con,"select * from package_booking_details");
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
		<td><?php echo $res['city']; ?></td>
		<td><?php echo $res['package']; ?></td>

		<td><?php echo $res['status']; ?></td>
		<td><?php echo $res['serial_number']; ?></td>


		<td><a style="color:green" href="update_tour.php?booking_id=<?php echo $oid; ?>">Update</a></td>

		<td><a style="color:red" href="cancel_tour.php?booking_id=<?php echo $oid; ?>">Cancel</a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>
<form method="post" action="generate_tours_booking_pdf.php">
    <button type="submit" name="download_pdf" class="btn btn-primary">
        <i class="fas fa-download"></i> Download PDF
    </button>
   
</form>

