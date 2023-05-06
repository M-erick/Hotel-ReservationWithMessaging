<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from tour_packages where package_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update tour_packages set package_no='$pid',name='$name',description='$description',duration='$duration',price='$price',location='$location' where package_id='$id' ");
header('location:dashboard.php?option=package');
echo "Package  updated successfully";

}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Package No</th>
		<td><input type="text"  name="pid" value="<?php echo $res['package_no']; ?>"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Name</th>
		<td><input type="text" name="name" value="<?php echo $res['name']; ?>"  class="form-control"/>
		</td>
	</tr>

	<tr>	
		<th>Description</th>
		<td><textarea name="description"  class="form-control"><?php echo $res['description']; ?></textarea>
		</td>
	</tr>
    <tr>	
		<th>Duration</th>
		<td><input type="text" name="duration" value="<?php echo $res['duration']; ?>"  class="form-control"/>
		</td>
	</tr>

	<tr>	
		<th>Price</th>
		<td><input type="text" name="price"  value="<?php echo $res['price']; ?>" class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Location</th>
		<td><input type="text" name="location"  value="<?php echo $res['location']; ?>" class="form-control"/>
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update package Details" name="update"/>
		</td>
	</tr>
</table> 
</form>