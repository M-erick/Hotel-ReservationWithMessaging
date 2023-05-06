<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<script>
	function delRoom(id)
	{
		if(confirm("You want to delete this package ?"))
		{
		window.location.href='delete_package.php?id='+id;	
		}
	}
</script>


<table class="table table-bordered table-striped table-hover">
	<h1>Package Details</h1><hr>
	<tr>
    <td colspan="6"><a href="dashboard.php?option=add_package" class="btn btn-primary">Add New Package</a></td>
	<td colspan="2"><a href="room_details_pdf.php" class="btn btn-primary"><i class="fas fa-print"></i> Print</a></td>
</tr>


	<tr style="height:40">
		<th>Sr No</th>
		<th>Image</th>
        <th>Package No</th>
		<th>Name</th>
		<th>Description</th>
        <th>Duration</th>
        <th>Price/ksh</th>
        <th>location</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from tour_packages");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['package_id'];	
$img=$res['image'];
$path="../image/tours/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
        <td><?php echo $res['package_no']; ?></td>
        <td><?php echo $res['name']; ?></td>
        <td>
           <ul>
        <?php
        $description = $res['description'];
        $bulletPoints = explode("\n", $description);
        foreach ($bulletPoints as $point) {
            echo "<li>$point</li>";
        }
        ?>
         </ul>
      </td>
        <td><?php echo $res['duration']; ?></td>


		<td><?php echo $res['price']; ?></td>
		<td><?php echo $res['location']; ?></td>

		<td><a href="dashboard.php?option=update_package&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delRoom('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>