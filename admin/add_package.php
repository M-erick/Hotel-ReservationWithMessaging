<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"select * from tour_packages where package_id='$pid'");
	if(mysqli_num_rows($sql))
	{
	echo "this Package is already added";	
	}		
	else
	{	
	$img=$_FILES['img']['name'];
	mysqli_query($con,"insert into tour_packages values('','$pid','$name','$description','$duration','$price','$img','$location')");	
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/tours/".$_FILES['img']['name']);
	echo "package added successfully";
	}
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Package No</th>
		<td><input type="text" name="pid"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Name</th>
		<td><input type="text" name="name"  class="form-control"/>
		</td>
	</tr>
	

	
	<tr>	
		<th>Description</th>
		<td><textarea name="description"  class="form-control"></textarea>
		</td>
	</tr>
    <tr>	
		<th>Duration</th>
		<td><input type="text" name="duration"  class="form-control"/>
		</td>
	</tr>
   
    <tr>	
		<th>Price</th>
		<td><input type="text" name="price"  class="form-control"/>
		</td>
	</tr>
	
	<tr>	
		<th>Images</th>
		<td><input type="file" name="img"  class="form-control"/>
		</td>
	</tr>
    <tr>	
		<th>Location</th>
		<td><input type="text" name="location"  class="form-control"/>
		</td>
	</tr>
   
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Package Details" name="add"/>
		</td>
	</tr>
</table> 
</form>