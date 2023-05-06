<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from tour_package where package_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update tour_package set package_no='$rno',type='$type',price='$price',Description='$details' where package_id='$id' ");
header('location:dashboard.php?option=tours');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Package No</th>
		<td><input type="text"  name="rno" value="<?php echo $res['package_no']; ?>"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Package Type</th>
		<td><input type="text" name="type" value="<?php echo $res['type']; ?>"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Price</th>
		<td><input type="text" name="price"  value="<?php echo $res['price']; ?>" class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Details</th>
		<td><textarea name="details"  class="form-control"><?php echo $res['details']; ?></textarea>
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Package Details" name="update"/>
		</td>
	</tr>
</table> 
</form>