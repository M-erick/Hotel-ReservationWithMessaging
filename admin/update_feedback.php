<?php 
include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from feedback where id='$id'");
$res=mysqli_fetch_assoc($sql);
extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update feedback set response ='$response' where id='$id'");
header('location:dashboard.php?option=feedback');	
}

?>

<form method="post" enctype="multipart/form-data">
	
<input type="text" name="price"  value="<?php echo $res['message']; ?>" class="form-control"/>

 	
<div class="form-group">
<textarea type="Text" name="response"  value="" class="form-control" id="#"placeholder="Reply"required></textarea>
 </div>
 <input type="submit" class="btn btn-primary" value="reply Feedback" name="update"/>

</form>